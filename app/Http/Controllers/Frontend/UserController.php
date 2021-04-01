<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{User, UserDetails, PasswordReset};
use Illuminate\Support\Facades\{Config, Auth, Validator, Hash, Crypt};
use Illuminate\Support\{Collection, Str};
use App\Traits\AutoResponderTrait;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;
use File,Image,DB,Session;
use Carbon\Carbon;


class UserController extends Controller
{
    use AutoResponderTrait;
    public function __construct()
    {

    }

    /*
    Method Name:    index
    Developer:      Shine Dezign
    Created Date:   2021-03-30 (yyyy-mm-dd)
    Purpose:        To display dashboard for user after login
    Params:         []
    */
    public function index()
    {
        $users_details = UserDetails::where('user_id', Auth::user()->id)
            ->first();
        if ($users_details != null) //if exist
        {
            Session::put('userdetails', $users_details);
        }
        $userDetail = User::with('user_detail')->find(Auth::user()->id);
        if(!$userDetail)
        
        return redirect()->route('logout');
        return view('user.dashboard',compact('userDetail'));
    }
    /* End Method index */

    /*
    Method Name:    edit_form
    Developer:      Shine Dezign
    Created Date:   2021-03-30 (yyyy-mm-dd)
    Purpose:        Form to update user details
    Params:         [id]
    */
    public function edit_form(){
        $userDetail = User::with('user_detail')->find(Auth::user()->id);
        if(!$userDetail)
        return redirect()->route('userdashboard');
    	return view('user.editprofile',compact('userDetail'));
    }
    /* End Method edit_form */

     /*
    Method Name:    edit_form
    Developer:      Shine Dezign
    Created Date:   2021-03-30 (yyyy-mm-dd)
    Purpose:        Form to update user details
    Params:         [id]
    */
    public function edit_password(){
        if(Auth::user()->id)
    	return view('user.changepassword');
    }
    /* End Method edit_form */

    /*
    Method Name:    password_reset
    Developer:      Shine Dezign
    Created Date:   2021-03-09 (yyyy-mm-dd)
    Purpose:        Form for forgot password
    Params:
    */
    public function password_reset()
    {
	    if(auth::check()){
            return redirect()->route('userdashboard');
        }
        return view('user.passwordreset');
    }
    /* End Method password_reset */

    /*
    Method Name:    password_reset_link
    Developer:      Shine Dezign
    Created Date:   2021-03-30 (yyyy-mm-dd)
    Purpose:        Send reset password link email if user email exist
    Params:         [email]
    */
    public function password_reset_link(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        $user = User::role('User')->where('email', $request->email)
            ->first();
        $template = $this->get_template_by_name('FORGOT_PASSWORD');

        if (!$user) return redirect()->back()
            ->with('status', 'error')
            ->with('message', Config::get('constants.ERROR.WRONG_CREDENTIAL'));
        $passwordReset = PasswordReset::updateOrCreate(['email' => $user->email], ['email' => $user->email, 'token' => Str::random(12) ]);

        $link = route('checktoken', $passwordReset->token);
        $string_to_replace = array(
            '{{$name}}',
            '{{$token}}'
        );
        $string_replace_with = array(
            'User',
            $link
        );
        $newval = str_replace($string_to_replace, $string_replace_with, $template->template);

        $logId = $this->email_log_create($user->email, $template->id, 'FORGOT_PASSWORD');
        $result = $this->send_mail($user->email, $template->subject, $newval);
        if ($result)
        {

            $this->email_log_update($logId);
            return redirect()->route('password.reset')
                ->with('status', 'success')
                ->with('message', Config::get('constants.SUCCESS.RESET_LINK_MAIL'));
        }
        else return redirect()
            ->route('password.reset')
            ->with('status', 'error')
            ->with('message', Config::get('constants.ERROR.OOPS_ERROR'));
    }
    /* End Method password_reset_link */

    /*
    Method Name:    password_reset_token_check
    Developer:      Shine Dezign
    Created Date:   2021-03-30 (yyyy-mm-dd)
    Purpose:        Checked reset access token
    Params:         [token]
    */
    public function password_reset_token_check($token)
    {
        $passwordReset = PasswordReset::where('token', $token)->first();
        if (!$passwordReset) return redirect()->route('password.reset')
            ->with('status', 'error')
            ->with('message', Config::get('constants.ERROR.TOKEN_INVALID'));

        if (Carbon::parse($passwordReset->updated_at)
            ->addMinutes(240)
            ->isPast())
        {
            $passwordReset->delete();
            return redirect()
                ->route('password.reset')
                ->with('status', 'error')
                ->with('message', Config::get('constants.ERROR.TOKEN_INVALID'));
        }
        Session::put('forgotemail', $passwordReset->email);
        return redirect()
            ->route('usersetnewpassword');
    }
    /* End Method password_reset_token_check */

    /*
    Method Name:    new_password_set
    Developer:      Shine Dezign
    Created Date:   2021-03-09 (yyyy-mm-dd)
    Purpose:        Form to set new password after reset password
    Params:
    */
    public function new_password_set()
    {
	    if(auth::check()){
            return redirect()->route('userdashboard');
        }
        if (Session::has('forgotemail')) return view('user.setnewpassword');
        else return redirect()
            ->route('password.reset')
            ->with('status', 'error')
            ->with('message', Config::get('constants.ERROR.OOPS_ERROR'));
    }
    /* End Method new_password_set */
     /*
    Method Name:    update_new_password
    Developer:      Shine Dezign
    Created Date:   2021-03-30 (yyyy-mm-dd)
    Purpose:        To update new password after reset pasword
    Params:         [password]
    */
    public function update_new_password(Request $request)
    {

        if (!Session::has('forgotemail')) return redirect()->route('password.reset')
            ->with('status', 'error')
            ->with('message', Config::get('constants.ERROR.OOPS_ERROR'));
        $email = Session::get('forgotemail');
        $request->validate(
            [
                'password' => 'required_with:password_confirmation|string|confirmed'
            ],
            [
                'password.required' => 'Password field is required',
                'password.confirmed' => 'Confirm Password must be same as new password'
            ]
    );
        try
        {
            $data = array(
                'password' => bcrypt($request->password) ,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $record = User::where('email', $email)->update($data);
            PasswordReset::where('email', $email)->delete();
            Session::forget('forgotemail');
            return redirect()
                ->route('login')
                ->with('status', 'success')
                ->with('message', 'Your password ' . Config::get('constants.SUCCESS.UPDATE_DONE'));

        }
        catch(\Exception $e)
        {
            return redirect()->back()
                ->with('status', 'error')
                ->with('message', $e->getMessage());
        }

    }
      /*
    Method Name:    update_record
    Developer:      Shine Dezign
    Created Date:   2021-03-30 (yyyy-mm-dd)
    Purpose:        To update user details
    Params:         [useremail, first_name, last_name, profile_picture]
    */
    public function update_record(Request $request)
    {
        $postData = $request->all();
        $request->validate([
            'first_name' => 'required|string|max:20',
            'last_name' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'address' => 'required|max:200',
            'mobile' => 'required|numeric|unique:user_details,mobile,'.Auth::user()->id.',user_id',
            'profile_picture' => 'image|mimes:jpeg,png,jpg',
        ]);
        try {
            /* If User uploaded profile picture */
            if ($request->hasFile('profile_picture'))
            {
                
                $allowedfileExtension = ['jpg', 'png', 'jpeg'];
                $file = $request->file('profile_picture');
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check)
                {
                    $image_resize = Image::make($file)->resize(null, 90, function ($constraint)
                    {
                        $constraint->aspectRatio();
                    })
                        ->encode($extension);
                    $users_details = UserDetails::where('user_id', Auth::user()->id)
                        ->first();
                    if ($users_details == null)
                    {
                        $users_details = UserDetails::create(['user_id' => Auth::user()->id, 'profile_picture' => $image_resize, 'imagetype' => $extension, 'status' => 1, 'created_at' => date('Y-m-d H:i:s') ]);
                    }
                    else
                    {
                        $users_details->update(['profile_picture' => $image_resize, 'imagetype' => $extension, 'updated_at' => date('Y-m-d H:i:s') ]);
                    }
                    Session::put('userdetails', $users_details);
                }
                else
                {
                return redirect()->back()->with('status', 'error')->with('message', "Please select png,jpeg or jpg images.");

                    // return response()->json(["success" => false, "msg" => "Please select png,jpeg or jpg images."], 200);
                }
            }
            /* End User uploaded profile picture*/

            $users = User::findOrFail(Auth::user()->id);

            $users->first_name = $postData['first_name'];
            $users->last_name = $postData['last_name'];
            $users->email = $postData['email'];
            $users->user_detail->address = $postData['address'];
            $users->user_detail->zipcode = $postData['zipcode'];
            $users->user_detail->mobile = $postData['mobile'];
            $users->push();

            return redirect()->route('detail.update')->with('status', 'success')->with('message', 'User details '.Config::get('constants.SUCCESS.UPDATE_DONE'));
        }
        catch ( \Exception $e )
        {
            return redirect()->back()->with('status', 'error')->with('message', $e->getMessage());
        }
    }
    /* End Method update_record */

    /*
    Method Name:    update_password
    Developer:      Shine Dezign
    Created Date:   2021-03-30 (yyyy-mm-dd)
    Purpose:        To update user password
    Params:         [oldpassword, newpassword]
    */
    public function update_password(Request $request)
    {
        
        $request->validate([
            'currentpassword' => 'required',
            'newpassword' => 'required|min:6',
            'confirmpassword' => 'required|same:newpassword',
        ]);
        $hashedPassword = Auth::user()->password;
        if (\Hash::check($request->currentpassword, $hashedPassword))
        {
            if (!\Hash::check($request->newpassword, $hashedPassword))
            {
                $users = User::find(Auth::user()->id);
                $users->password = bcrypt($request->newpassword);
                $users->save();
                return redirect()->route('change.password')->with('status', 'success')->with('message', 'User password updated Successfully'); 
            }
            else
            {
                return redirect()->back()->with('status', 'error')->with('message', 'New password can not be the old password!');
            }
        }
        else
        {
            return redirect()->back()->with('status', 'error')->with('message', 'Old password doesnt matched');
        }
    }
    /* End Method update_password */
}

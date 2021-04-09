<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\AutoResponderTrait;
use Illuminate\Support\Facades\{Config, Auth};
use App\{Booking, User};

class BookingController extends Controller
{
     use AutoResponderTrait;
   /*
    Method Name:    getList
    Developer:      Shine Dezign
    Created Date:   2021-03-09 (yyyy-mm-dd)
    Purpose:        To get list of all bookings
    Params:
    */
    public function getList(Request $request){

        $start = $end =  '';

        if($request->has('search_keyword') && $request->search_keyword != '')
        {
            $keyword = $request->search_keyword;
        }
        else
        {
            $keyword = '';
        }

        if($request->has('daterange_filter') && $request->daterange_filter != '')
        {
            $daterange = $request->daterange_filter;
            $daterang = explode(' / ',$daterange);
            $start = $daterang[0];
            $end = $daterang[1];
        }
        else
        {
            $daterange = '';
        }
        $data = Booking::when($request->search_keyword, function($q) use($request){
            $q->where(function ($quer) use ($request) {
                $quer->where('booking_name', 'like', '%'.$request->search_keyword.'%')
                ->orWhere('booking_email', 'like', '%'.$request->search_keyword.'%')
                ->orWhere('status', 'like', '%'.$request->search_keyword.'%')
                ->orWhere('id', $request->search_keyword)
                ->orWhereHas('venue', function( $query ) use ( $request ){
                    $query->where('name','like', '%'.$request->search_keyword.'%');
                });
            });
        })->when($daterange != '', function ($query) use ($start, $end)
        {
            $query->whereBetween('date', [$start, $end]);

        })->where('user_id',Auth::user()->id)->sortable('id')->paginate(Config::get('constants.PAGINATION_NUMBER'));
        return view('user.bookings.list', compact('data','daterange','keyword'));
    }

       /*
    Method Name:    view_detail
    Developer:      Shine Dezign
    Created Date:   2021-04-07 (yyyy-mm-dd)
    Purpose:        To get detail of Booking
    Params:         [id]
    */
    public function view_detail($id,Request $request){
        $bookingDetail = Booking::find($id);
    
        if(!$bookingDetail)
            return redirect()->route('bookings.mybookings');

        return view('user.bookings.view_detail',compact('bookingDetail'));
    }
    // End method view Detail

    /*
    Method Name:    booking_cancel
    Developer:      Shine Dezign
    Created Date:   2021-04-07 (yyyy-mm-dd)
    Purpose:        To get detail of Booking
    Params:         [id]
    */
    public function booking_cancel(Request $request){
          try {
        $bookingDetail = Booking::findOrFail($request->id);
        $bookingDetail->status = 3;
        $bookingDetail->push();
        if($bookingDetail != 3){
            $this->send_notification("DECLINE_BOOKING",$bookingDetail->user->email,$bookingDetail->user->first_name,date('d F Y', strtotime($bookingDetail->date)));
        }
        return redirect()->back()->with('status', 'success')->with('message', 'Booking cancelled has been successfully');

        }catch(Exception $ex){
            return redirect()->back()->with('status', 'error')->with('message', $ex->getMessage());
        }
    }

    function send_notification($btemplate,$email,$name,$date){
       
        $template = $this->get_template_by_name($btemplate);
        $string_to_replace = array(
            '{{$name}}',
            '{{$date}}'
        );
        $string_replace_with = array(
            $name,
            $date
        );
        $newval = str_replace($string_to_replace, $string_replace_with, $template->template);
       
        $logId = $this->email_log_create($email, $template->id, $btemplate);
        $result = $this->send_mail($email, $template->subject, $newval);
        if ($result)
        {
            $this->email_log_update($logId);
            return;
        }
        return;
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Commission;

class CommissionController extends Controller
{
    /*
    Method Name:    add_form
    Developer:      Shine Dezign
    Created Date:   2021-03-24 (yyyy-mm-dd)
    Purpose:        Form to add/edit commision
    Params:         []
    */
    public function add_form(){
        $commission = Commission::first();

    	return view('admin.commissions.add',compact('commission'));
    }
    /* End Method add_form */

        /*
    Method Name:    add_record
    Developer:      Shine Dezign
    Created Date:   2021-03-24 (yyyy-mm-dd)
    Purpose:        To add/edit Commission
    Params:         [commission_percentage, edit_record_id, status]
    */
    public function add_record(Request $request){

        $request->validate([
            'commission_percentage' => 'required',
            'status' => 'required',
        ]);
        try {

            if($request->edit_record_id){
                $commission = Commission::findOrFail($request->edit_record_id);
                $commission->commission_percentage = $request->commission_percentage;
                $commission->status = $request->status;
                $commission->push();
                return redirect()->back()->with('status', 'success')->with('message', 'Commission '.Config::get('constants.SUCCESS.UPDATE_DONE'));
            }else{
                $record = Commission::create([
                    'commission_percentage'=> $request->commission_percentage,
                    'status' => $request->status
                ]);

                if($record){
                    return redirect()->back()->with('status', 'success')->with('message', 'Commission '.Config::get('constants.SUCCESS.CREATE_DONE'));
                }
            }
            return redirect()
                    ->back()->with('status', 'error')
                    ->with('message', Config::get('constants.ERROR.OOPS_ERROR'));
        } catch ( \Exception $e ) {
            return redirect()->back()->with('status', 'error')->with('message', $e->getMessage());
        }
    }
    /* End Method add_record */
}

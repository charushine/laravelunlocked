<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use Illuminate\Support\Str;
use Cookie, Session, DB;
use App\Venue;

class SiteController extends Controller
{
     /*
    Method Name:    index
    Developer:      Shine Dezign
    Created Date:   2021-03-30 (yyyy-mm-dd)
    Purpose:        To display homepage of front panel
    Params:         []
    */
    public function index()
    {
		$id = strtoupper(substr(md5(request()->ip().Str::random(12)), 5, 10));
		if(request()->cookie('USER_COOKIE_ID')){
			session::put('user_cookie_id', request()->cookie('USER_COOKIE_ID'));
		}
		else{
			Cookie::queue(cookie('USER_COOKIE_ID', $id, $minute = 43200));
			session::put('user_cookie_id', $id);
        }
        $venues = Venue::where('status', 1)->get();
      
        return view('welcome',compact('venues'));
    }

     /*
    Method Name:    getvenues
    Developer:      Shine Dezign
    Created Date:   2021-03-31 (yyyy-mm-dd)
    Purpose:        To show Venues with ajax request
    Params:         [keyword]
    */
    public function getvenues(Request $request ,$keyword=""){
        // DB::enableQueryLog();
        $offset = 10;
        if($request->page){
            $offset = $request->page;
        }
        if($request->has('daterange') && $request->daterange != '')
        {
            $daterange = $request->daterange;
            $daterang = explode(' / ',$daterange);
            $start = $daterang[0];
            $end = $daterang[1];
        }
        else
        {
            $daterange = '';
        }
        $venues = Venue::when($keyword != "", function($q) use($keyword){
            $q->where('name', 'like', '%'.$keyword.'%')
              ->orWhere('location', 'like', '%'.$keyword.'%')        
              ->orWhere('contact', 'like', '%'.$keyword.'%')          
              ->orWhere('building_type', 'like', '%'.$keyword.'%')         
              ->orWhere('amenities_detail', 'like', '%'.$keyword.'%')         
              ->orWhere('other_information', 'like', '%'.$keyword.'%')         
              ->orWhere('is_featured', 'like', '%'.$keyword.'%')          
              ->orWhere('total_room', 'like', '%'.$keyword.'%')          
              ->orWhere('booking_price', 'like', '%'.$keyword.'%')         
              ->orWhere('status', 'like', '%'.$keyword.'%');                 
        })->where('status', 1)->orderBy('booking_price', 'asc')->take($offset)->get();

        // dd(DB::getQueryLog());
        return view('showvenues',compact('venues'));
    }

    /*
    Method Name:    venue_detail
    Developer:      Shine Dezign
    Created Date:   2021-03-31 (yyyy-mm-dd)
    Purpose:        To get venue detail by id
    Params:         [id]
    */
    function venue_detail($id){

        $venue =  Venue::find($id);
        return view('venuedetail',compact('venue'));
    }
    
    function book_venue(Request $request){
        $id = $request->id;
        return view('book_venue',compact('id'));
    }
}


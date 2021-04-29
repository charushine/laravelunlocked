<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cookie, Session, DB, Auth;
use App\{Venue, Testimonial, SearchLog, Category};
use Illuminate\Support\Facades\Validator;


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
        $id = strtoupper(substr(md5(request()->ip() . Str::random(12)), 5, 10));
        if (request()->cookie('USER_COOKIE_ID')) {
            session::put('user_cookie_id', request()->cookie('USER_COOKIE_ID'));
        } else {
            Cookie::queue(cookie('USER_COOKIE_ID', $id, $minute = 43200));
            session::put('user_cookie_id', $id);
        }
        $venues = Venue::where('status', 1)->get();
        $testimonials = Testimonial::get();
        $categories = Category::where('status', 1)->get();

        return view('welcome', compact('venues', 'testimonials', 'categories'));
    }

    /*
    Method Name:    getAllVenue
    Developer:      Shine Dezign
    Created Date:   2021-03-31 (yyyy-mm-dd)
    Purpose:        To show category Venues
    Params:         [keyword]
    */
    public function getAllVenue($id, Request $request)
    {
        $category_id =  Category::find($id);
        if (!$category_id)
            return redirect()->route('home');

        $venues =  DB::table('venues')
            ->select('venues.name', 'venues.id', 'venues.location', 'venue_images.id', 'venue_images.name as venue_image', 'venues.booking_price', 'venues.average_rating')
            ->join('venue_images', 'venue_images.venue_id', '=', 'venues.id')
            ->where(['venues.category_id' => $id, 'venues.status' => 1])
            ->get();
        return view('showvenues', compact('venues'));
    }

    /*
    Method Name:    getCategoryVenue
    Developer:      Shine Dezign
    Created Date:   2021-03-31 (yyyy-mm-dd)
    Purpose:        To show category Venues
    Params:         [keyword]
    */
    public function getCategoryVenue(Request $request)
    {
        // print_r($request->all());
        // die();
        // $request->validate([
        //     'category_id' => 'required',
        //     'guest' => 'required'
        // ]);

        $rules = [
            'category_id' => 'required|numeric',
        ];

        $messages = [
            'category_id.required' => 'User profile id cannot be Empty',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // return view('welcome', compact('venues'));
            // $message = '';

            return redirect()->route('home')->with('message', $validator->errors()->all());
        }

        $guests = explode('-', $request->guest);

        $venues =  DB::table('venues')
            ->select('venues.name', 'venues.id', 'venues.location', 'venue_images.id', 'venue_images.name as venue_image', 'venues.booking_price', 'venues.average_rating')
            ->join('venue_images', 'venue_images.venue_id', '=', 'venues.id')
            ->where(['venues.category_id' => $request->category_id, 'venues.status' => 1])->orWhere(['venues.no_of_people' => [$guests[0], $guests[1]]])
            ->get();

        // $venues = Venue::where(['category_id' => $request->category_id, 'status' => 1])->get();

        return view('showvenues', compact('venues'));
    }

    /*
    Method Name:    getvenues
    Developer:      Shine Dezign
    Created Date:   2021-03-31 (yyyy-mm-dd)
    Purpose:        To show Venues with ajax request
    Params:         [keyword]
    */
    public function getvenues(Request $request, $keyword = "")
    {

        $offset = 10;
        if ($request->page) {
            $offset = $request->page;
        }
        if ($keyword != "") {
            $data = [
                'date' => date('Y-m-d H:i:s'),
                'user_id' => Auth::user()->id or 0,
                'keyword' => $keyword,
                'client_name' =>  $request->header('User-Agent'),
            ];
            $ip = $request->ip();
            $searchIp = SearchLog::where('ips', $ip)->first();

            if ($searchIp) {
                unserialize($searchIp->key_logs);
            } else {
                SearchLog::create(['ips' => $ip, 'keylogs' => serialize($data)]);
            }
        }
        //Sorting by price and rating
        $oColumn = "booking_price";
        $orderby = "asc";
        if ($request->sorting) {
            $sortVal = explode('-', $request->sorting);
            if ($sortVal && isset($sortVal[0]) && $sortVal[0] != "") {
                $oColumn = $sortVal[0] == "price" ? "booking_price" : "average_rating";
            }
            if (isset($sortVal[1]) && $sortVal[1] != "") {
                $orderby = $sortVal[1] == "asc" ? "asc" : "desc";
            }
        }

        $start = $end = $price = '';
        if ($request->has('daterange') && $request->daterange != '') {
            $daterange = $request->daterange;
            $daterang = explode(' / ', $daterange);
            $start = $daterang[0];
            $end = $daterang[1];
        } else {
            $daterange = '';
        }

        if ($request->price) {
            $price = $request->price;
        } else {
            $price = "";
        }

        if ($request->no_of_people) {
            $no_of_people = $request->no_of_people;
        } else {
            $no_of_people = "";
        }

        if ($request->rating) {
            $rating = $request->rating;
        } else {
            $rating = "";
        }

        if ($request->amenity) {
            $amenity = $request->amenity;
        } else {
            $amenity = "";
        }

        $venues = Venue::when($keyword != "", function ($q) use ($keyword) {
            $q->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('location', 'like', '%' . $keyword . '%')
                ->orWhere('contact', 'like', '%' . $keyword . '%')
                ->orWhere('building_type', 'like', '%' . $keyword . '%')
                ->orWhere('amenities_detail', 'like', '%' . $keyword . '%')
                ->orWhere('other_information', 'like', '%' . $keyword . '%')
                ->orWhere('is_featured', 'like', '%' . $keyword . '%')
                ->orWhere('total_room', 'like', '%' . $keyword . '%')
                ->orWhere('booking_price', 'like', '%' . $keyword . '%')
                ->orWhere('status', 'like', '%' . $keyword . '%');
        })->when($price != "", function ($qe) use ($price) {
            $qe->where("booking_price", "<", $price);
        })
            ->when($daterange != "", function ($qu) use ($start, $end) {
                $qu->whereDoesntHave('booking', function ($query) use ($start, $end) {
                    $query->whereBetween('date', [$start, $end]);
                });
            })
            ->when($rating != "", function ($qy) use ($rating) {
                $qy->where('average_rating', '<', ($rating + 1));
            })
            ->when($amenity != "", function ($amty) use ($amenity) {
                $amty->whereHas('venue_amenities', function ($qury) use ($amenity) {
                    $qury->where(function ($qee) use ($amenity) {
                        foreach ($amenity as $amenity) {
                            $qee->whereRaw("find_in_set('" . $amenity . "',venue_amenities.amenity_id)");
                        }
                    });
                });
            })
            ->when($no_of_people != "", function ($qye) use ($no_of_people) {
                $qye->where('no_of_people', '<',  $no_of_people);
            })
            ->where('status', 1)->orderBy($oColumn, $orderby)->take($offset)->get();

        return view('showvenues', compact('venues'));
    }

    /*
    Method Name:    venue_detail
    Developer:      Shine Dezign
    Created Date:   2021-03-31 (yyyy-mm-dd)
    Purpose:        To get venue detail by id
    Params:         [id]
    */
    function venue_detail($id)
    {

        $venue =  Venue::find($id);
        return view('venuedetail', compact('venue'));
    }

    function book_venue(Request $request)
    {

        $id = $request->id;
        return view('book_venue', compact('id'));
    }
}

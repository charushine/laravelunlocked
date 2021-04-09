<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Config};
use App\Blog;

class BlogController extends Controller
{
      /*
    Method Name:    add_form
    Developer:      Shine Dezign
    Created Date:   2021-03-22 (yyyy-mm-dd)
    Purpose:        Form to add venue details
    Params:         []
    */
    public function getList(){
        $blogs = Blog::sortable('id')->paginate(Config::get('constants.PAGINATION_NUMBER'));
    	return view('user.blogs.list',compact('blogs'));
    }
    /* End Method add_form */
}

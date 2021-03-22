<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Blog;
use File;
use Str;

class BlogController extends Controller
{
     /*
    Method Name:    getList
    Developer:      Shine Dezign
    Created Date:   2021-03-18 (yyyy-mm-dd)
    Purpose:        To get list of all Blogs
    Params:
    */
    public function getList(Request $request){
        $data = Blog::when($request->search_keyword, function($q) use($request){
            $q->where('title', 'like', '%'.$request->search_keyword.'%')
            ->orWhere('id', $request->search_keyword)
            ->orWhere('content', 'like', '%'.$request->search_keyword.'%');
        })->sortable('id')->paginate(Config::get('constants.PAGINATION_NUMBER'));

        return view('admin.blogs.list',compact('data'));
    }
    /* End Method getList */

     /*
    Method Name:    add_form
    Developer:      Shine Dezign
    Created Date:   2021-03-18 (yyyy-mm-dd)
    Purpose:        Form to add blog details
    Params:         []
    */
    public function add_form(){

    	return view('admin.blogs.add');
    }
    /* End Method add_form */

    /*
    Method Name:    add_record
    Developer:      Shine Dezign
    Created Date:   2021-03-18 (yyyy-mm-dd)
    Purpose:        To add blog
    Params:         [title, content, cover_photo, status]
    */
    public function add_record(Request $request){

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'cover_photo' => 'image|mimes:jpeg,png,jpg,svg',
            'status' => 'required',
        ],[
            'cover_photo.image' => 'Choose the image jpg,jpeg,png or svg format Only'
        ]);
        try {
            $coverPhoto = '';
            if($request->hasFile('cover_photo'))
            {
                $blogPhoto = $request->file('cover_photo');

                $uploadpath = public_path().'/assets/blog/images/';

                    $file = $blogPhoto;
                    $orignlname = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $slug = Str::slug($request->title);
                    $coverPhoto = $slug."-".$orignlname;
                    $image_path = $uploadpath.'/'.$coverPhoto; // Value is not URL but directory file path
                    $file->move($uploadpath, $coverPhoto);
            }
            $data =[
                'title' => $request->title,
                'content' => $request->content,
                'cover_photo' => $coverPhoto,
                'status' => $request->status
            ];
            $record = Blog::create($data);
            if($record){
                $routes = ($request->action == 'saveadd') ? 'blog.add' : 'blogs.list';
        		return redirect()->route($routes)->with('status', 'success')->with('message', 'Blog '.Config::get('constants.SUCCESS.CREATE_DONE'));
        	}
            return redirect()
                    ->back()->with('status', 'error')
                    ->with('message', Config::get('constants.ERROR.OOPS_ERROR'));
        } catch ( \Exception $e ) {
            return redirect()->back()->with('status', 'error')->with('message', $e->getMessage());
        }
    }
    /* End Method add_record */

    /*
    Method Name:    edit_form
    Developer:      Shine Dezign
    Created Date:   2021-03-18 (yyyy-mm-dd)
    Purpose:        Form to update blog details
    Params:         [id]
    */
    public function edit_form($id){

        $blogDetail = Blog::find($id);
        if(!$blogDetail)
            return redirect()->route('blogs.list');
    	return view('admin.blogs.edit',compact('blogDetail'));
    }
    /* End Method edit_form */

        /*
    Method Name:    update_record
    Developer:      Shine Dezign
    Created Date:   2021-03-17 (yyyy-mm-dd)
    Purpose:        To update category details
    Params:         [title, content, cover_photo, status]
    */
    public function update_record(Request $request){
        $postData = $request->all();
        $id = $postData['edit_record_id'];

        $request->validate([
            'title' => '',
            'content' => 'required',
            'cover_photo' => 'image|mimes:jpeg,png,jpg,svg',
            'status' => 'required',
        ],[
            'cover_photo.image' => 'Choose the image jpg,jpeg,png or svg format Only'
        ]);

        try {
            $blogPhoto = $request->cover_photo_old;
            if($request->hasFile('cover_photo'))
            {
                $uploadpath = public_path().'/assets/blog/images/';
                $file = $request->file('cover_photo');
                $orignlname = $file->getClientOriginalName();
                $image_path = $uploadpath.'/'.$request->cover_photo_old; // Value is not URL but directory file path
                if(File::exists($image_path))
                {
                    File::delete($image_path);
                }
                $extension = $file->getClientOriginalExtension();
                $slug = Str::slug($request->title);
                $blogPhoto = $slug.'-'.$orignlname;
                $file->move($uploadpath, $blogPhoto);
            }

            $blogs = Blog::findOrFail($id);
            $blogs->title = $postData['title'];
            $blogs->content = $postData['content'];
            $blogs->cover_photo = $blogPhoto;
            $blogs->status = $postData['status'];
            $blogs->push();

            return redirect()->route('blogs.list')->with('status', 'success')->with('message', 'Blog '.Config::get('constants.SUCCESS.UPDATE_DONE'));
        } catch ( \Exception $e ) {
            return redirect()->back()->with('status', 'error')->with('message', $e->getMessage());
        }
    }
    /* End Method update_record */
}

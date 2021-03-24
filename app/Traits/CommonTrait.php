<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\{State, County, User};
use Image;

trait CommonTrait
{

    /*
    Method Name:    uploadDocument
    Developer:      Shine Dezign
    Created Date:   2021-03-05 (yyyy-mm-dd)
    Purpose:        To upload document on s3 bucket
    Params:         []
    */
    public function uploadDocument($uploadpath, $document, $documentname)
    {


    }
    /* End Method uploadDocument */



    /*
    Method Name:    getUsers
    Developer:      Shine Dezign
    Created Date:   2021-03-05 (yyyy-mm-dd)
    Purpose:        To get list of all users
    Params:         []
    */
    public function getUsers()
    {
        $users = User::role('User')->select('id', 'first_name', 'last_name', 'email', 'status','created_at')->orderBy('id', 'asc')->get()->toArray();
        return $users;
    }
    /* End Method getOwners */
    /*
    Method Name:    getOwners
    Developer:      Shine Dezign
    Created Date:   2021-03-05 (yyyy-mm-dd)
    Purpose:        To get list of all users
    Params:         []
    */
    public function getOwners()
    {
        $owners = User::role('Owner')->select('id', 'first_name', 'last_name', 'email', 'status','created_at')->orderBy('id', 'asc')->get()->toArray();
        return $owners;
    }
    /* End Method getUsers */

    /*
    Method Name: createThumbnail
    Developer: Shine Dezign
    Created Date: 2021-03-15 (yyyy-mm-dd)
    Purpose: To create thumbnail at fly
    Params: []
    */
    public function createThumbnail($image, $extension, $width = 250, $height = 75)
    {
    try{
        $image_resize = Image::make($image)->resize( $width, $height, function ( $constraint ) {
        $constraint->aspectRatio();
        })->encode($extension);
        return $image_resize;
    }
    catch(\Exception $e)
    {
    return FALSE;
    }
    }
    /* End Method createThumbnail */

    /*
    Method Name:    stateList
    Developer:      Shine Dezign
    Created Date:   2021-03-05 (yyyy-mm-dd)
    Purpose:        To get list of all active state
    Params:         []
    */
    public function stateList()
    {
        $states = State::where('status', 1)
            ->get(['id', 'name']);
        return $states;
    }
    /* End Method stateList */

    /*
    Method Name:    countyList
    Developer:      Shine Dezign
    Created Date:   2021-03-05 (yyyy-mm-dd)
    Purpose:        To get list of all active counties
    Params:         []
    */
    public function countyList()
    {
        $counties = County::where('status', 1)
            ->get(['id', 'state_id', 'name']);
        return $counties;
    }
    /* End Method countyList */

    /*
    Method Name:    countyByStateId
    Developer:      Shine Dezign
    Created Date:   2021-03-05 (yyyy-mm-dd)
    Purpose:        To get list of all active counties on the basic of state
    Params:         [state_id]
    */
    public function countyByStateId($state_id)
    {
        $counties = County::where('state_id', $state_id)
            ->where('status', 1)
            ->get(['id', 'state_id', 'name']);
        return $counties;
    }
    /* End Method countyByStateId */

}


<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Category;
use DB;

class CategoryController extends Controller
{
       /*
    Method Name:    getList
    Developer:      Shine Dezign
    Created Date:   2021-03-15 (yyyy-mm-dd)
    Purpose:        To get list of all Categories && Sub caetegories
    Params:
    */
    public function getList(Request $request){

        $data = Category::when($request->search_keyword, function($q) use($request){
            $q->where('id', $request->search_keyword)
            ->orWhere('name', $request->search_keyword)
            ->orWhereHas('parent', function( $query ) use ( $request ){
                $query->where('name','like', '%'.$request->search_keyword.'%');
            });
        })->with(['parent'])->sortable('id')->paginate(Config::get('constants.PAGINATION_NUMBER'));

        return view('admin.categories.list',compact('data'));
    }

    /* End Method getList */

     /*
    Method Name:    add_form
    Developer:      Shine Dezign
    Created Date:   2021-03-17 (yyyy-mm-dd)
    Purpose:        Form to add category details
    Params:         []
    */
    public function add_form(){

        $pCategories = Category::where('parent_id',null)->get();
    	return view('admin.categories.add',compact('pCategories'));
    }
    /* End Method add_form */

    /*
    Method Name:    add_record
    Developer:      Shine Dezign
    Created Date:   2021-03-17 (yyyy-mm-dd)
    Purpose:        To add categories
    Params:         [parent_id, name, status]
    */
    public function add_record(Request $request){

        $request->validate([
            'parent_id' => '',
            'name' => 'required|string|unique:categories,name',
            'status' => 'required',
        ]);
        try {
            $data =[
                'parent_id' => $request->parent_id,
                'name' => $request->name,
                'status' => $request->status,
            ];
            $record = Category::create($data);
            if($record){
                $routes = ($request->action == 'saveadd') ? 'category.add' : 'categories.list';
        		return redirect()->route($routes)->with('status', 'success')->with('message', 'Category '.Config::get('constants.SUCCESS.CREATE_DONE'));
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
    Method Name:    change_status
    Developer:      Shine Dezign
    Created Date:   2021-03-17 (yyyy-mm-dd)
    Purpose:        To change the status of category [active/inactive]
    Params:         [id, status]
    */
    public function change_status(Request $request){

        $getData = $request->all();
        $category = Category::find($getData['id']);
        $category->status = $getData['status'];
        $category->save();

        return redirect()->back()->with('status', 'success')->with('message', "Status " .Config::get('constants.SUCCESS.STATUS_UPDATE'));
    }
    /* End Method change_status */

     /*
    Method Name:    edit_form
    Developer:      Shine Dezign
    Created Date:   2021-03-17 (yyyy-mm-dd)
    Purpose:        Form to update category details
    Params:         [id]
    */
    public function edit_form($id){
        $pCategories = Category::where('parent_id',null)->get();

        $categoryDetail = Category::find($id);
        if(!$categoryDetail)
            return redirect()->route('categories.list');
    	return view('admin.categories.edit',compact('categoryDetail','pCategories'));
    }
    /* End Method edit_form */

    /*
    Method Name:    update_record
    Developer:      Shine Dezign
    Created Date:   2021-03-17 (yyyy-mm-dd)
    Purpose:        To update category details
    Params:         [edit_record_id, parent_id, name, status]
    */
    public function update_record(Request $request){
        $postData = $request->all();
        $id = $postData['edit_record_id'];
        if($postData['parent_id'] == $id){
            return redirect()->back()->with('status', 'error')->with('message', "Parent & Category name should not be same");
        }
        $request->validate([
            'parent_id' => '',
            'name' => 'required|string|unique:categories,name,'.$id,
            'status' => 'required'
        ],[
            'name.unique' => 'Category name has already been taken.'
        ]);

        try {
            $categories = Category::findOrFail($id);
            $categories->parent_id = $postData['parent_id'];
            $categories->name = $postData['name'];
            $categories->status = $postData['status'];
            $categories->push();

            return redirect()->route('categories.list')->with('status', 'success')->with('message', 'Category detail '.Config::get('constants.SUCCESS.UPDATE_DONE'));
        } catch ( \Exception $e ) {
            return redirect()->back()->with('status', 'error')->with('message', $e->getMessage());
        }
    }
    /* End Method update_record */

    /*
    Method Name:    del_record
    Developer:      Shine Dezign
    Created Date:   2021-03-17 (yyyy-mm-dd)
    Purpose:        To delete category by id[delete all category related with parent id]
    Params:         [id]
    */
    public function del_record(Request $request){
        try {
            $getData = $request->all();
            $category = Category::where('id',$getData['id'])->orWhere('parent_id',$getData['id'])->update(['is_deleted' => $getData['is_deleted']]);
            if($getData['is_deleted'] == 0){
                $status = 'RECOVER_DONE';
            }else{
                $status = 'DELETE_DONE';
            }
            // $category->is_deleted = 1;
            // $category->save();

        	return redirect()->back()->with('status', 'success')->with('message', 'Category details '.Config::get('constants.SUCCESS.'.$status));
        }catch(Exception $ex){
            return redirect()->back()->with('status', 'error')->with('message', $ex->getMessage());
        }
    }
     /* End Method del_record */

}

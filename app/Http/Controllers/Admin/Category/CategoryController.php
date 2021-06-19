<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Admin\Category;
use DB;
class CategoryController extends Controller
{
    // to gieve access only for autonticate users
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function category(){ 
        $categories = Category::all();
        return view('admin.category.category',compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $validateData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);

        // $data=array();
        // $data['category_name']=$request->category_name;

        // DB::table('categories')->insert($data);

        // alternative 
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();

        $notification=array(
            'messege'=>'Category Added Successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
     }

     public function deleteCategory($id){
        //  DB::table('categories')->where('id', $id)->delete();
         $category = Category::find($id);
         $category->delete();

         $notification=array(
            'messege'=>'Category Deleted Successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
     }

     public function editCategory($id){
          $category = DB::table('categories')->where('id', $id)->first();
          return view('admin.category.edit_category', compact('category'));
     }

     public function updateCategory(Request $request, $id)
    {
        $validateData = $request->validate([
            'category_name' => 'required|max:255',
        ]);

        $data=array();
        $data['category_name']=$request->category_name;
        $update = DB::table('categories')->where('id', $id)->update($data);
        if($update) {
            $notification = array(
                'messege' => 'Category Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('categories')->with($notification);
        }else{
            $notification=array(
                'messege' => 'Nothing To Update',
                'alert-type' => 'error'
            );
            return Redirect()->route('categories')->with($notification);
        }
        

        // alternative 
        // $category = Category::find($id);
        // $category->category_name = $request->category_name;
        // $category->save();

        // $notification=array(
        //     'messege'=>'Category Updated Successfully',
        //     'alert-type'=>'success'
        //      );
        //    return Redirect()->route('categories')->with($notification);
     }
}

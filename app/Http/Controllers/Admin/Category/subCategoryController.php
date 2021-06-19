<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Subcategory;
use DB;

class subCategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function subCategories() 
    {
         $categories = DB::table('categories')->get();
         $subcat = DB::table('subCategories')
                    ->join('categories', 'subcategories.category_id', 'categories.id')
                    ->select('subcategories.*', 'categories.category_name')
                    ->get();
        return view('admin.subCategory.subCategory', compact('categories','subcat'));
    }

    public function storeSubcategory(Request $request)
    {
        $validateData = $request->validate([
          'category_id' => 'required',
          'subcategory_name' => 'required',
        ]);

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;
        // dd($request);
        DB::table('subcategories')->insert($data);
        // $subCategory = new Subcategory();
        // $subCategory->category_id = $request->category_id;
        // $subCategory->subcategory_name = $request->subcategory_name;
        // $subCategory->save();

        $notification=array(
            'messege'=>'Sub category Added Successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);

    }

    public function deleteSubCategory($id)
    {
        $subCategory = Subcategory::find($id);
        $subCategory->delete();

        $notification=array(
            'messege'=>'Sub Category Deleted Successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }

    public function editSubCategory($id)
    {
        $subCategory = DB::table('subcategories')->where('id', $id)->first();
        $categories = DB::table('categories')->get();
        return view('admin.subCategory.edit_subcategory', compact('subCategory', 'categories'));
    }

    public function updateSubCategory(Request $request, $id)
    {
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;
        // dd($request);
        DB::table('subcategories')->where('id', $id)->update($data);

        $notification=array(
            'messege'=>'Sub category Updated Successfully',
            'alert-type'=>'success'
             );
           return Redirect()->route('sub.categories')->with($notification);

    }
}

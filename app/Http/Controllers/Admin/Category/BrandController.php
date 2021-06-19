<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Brand;
use DB;

class BrandController extends Controller
{
    // to gieve access only for autonticate users
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function brand()
    {
        $brands = Brand::all();
        return view('admin.brand.brand',compact('brands'));
    }

    public function storeBrand(Request $request)
    {
        $validateData = $request->validate([
            'brand_name' => 'required|unique:brands|max:255',
            
        ]);

        $data = array();
        $data['brand_name']=$request->brand_name;
        $image = $request->file('brand_logo');
        if($image) {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'media/brand/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            $data['brand_logo'] = $image_url;
            $brand = DB::table('brands')->insert($data);

            $notification=array(
                'messege'=>'Brand Added Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
        }else{
            $brand = DB::table('brands')->insert($data);
            $notification=array(
                'messege'=>'Its Done',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
        }        
    }
    public function deleteBrand($id)
    {   
        // $brand = Brand::find($id);
        // $brand->delete();

        // alternative

        $data = DB::table('brands')->where('id', $id)->first();
        $image = $data->brand_logo;
        unlink($image);
        $brand = DB::table('brands')->where('id', $id)->delete();

        $notification=array(
            'messege'=>'brand Deleted Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

    public function editBrand($id){
        $brand = DB::table('brands')->where('id', $id)->first();
        return view('admin.brand.edit_brand', compact('brand'));
   }

   public function updateBrand(Request $request, $id)       
   {

    $oldlogo = $request->old_logo;
    $data = array();
    $data['brand_name']=$request->brand_name;
    $image = $request->file('brand_logo');
    if($image) {
        $image_name = date('dmy_H_s_i');
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'media/brand/';
        $image_url = $upload_path.$image_full_name;
        $success = $image->move($upload_path, $image_full_name);

        $data['brand_logo'] = $image_url;
        $brand = DB::table('brands')->where('id', $id)->update($data);

        $notification=array(
            'messege'=>'Brand updated Successfully',
            'alert-type'=>'success'
             );
           return Redirect()->route('brands')->with($notification);
    }else{
        $brand = DB::table('brands')->where('id', $id)->update($data);
        $notification=array(
            'messege'=>'Update with out Images',
            'alert-type'=>'success'
             );
             return Redirect()->route('brands')->with($notification);
    }        
   }
}

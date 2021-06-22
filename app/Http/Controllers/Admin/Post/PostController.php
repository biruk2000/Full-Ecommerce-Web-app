<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function displayPosts()
    {
       
    }

    public function displayCategory()
    {
        
    }

    public function blogCatList()
    {
        $blogcats = DB::table('post_category')->get();

        return view('admin.blog.category.index', compact('blogcats'));
    }

    public function storeBlog(Request $request)
    {

        $validateData = $request->validate([
            'category_name_en' => 'required|max:255',
            'category_name_am' => 'required|max:255' 
        ]);
        $data = array();
        $data['category_name_en'] = $request->category_name_en;
        $data['category_name_am'] = $request->category_name_am;

        DB::table('post_category')->insert($data);
    
        $notification=array(
            'messege'=>'Blog Category Added Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

    public function deleteBlogCat($id)
    {
        $blogcat = DB::table('post_category')->where('id', $id)->delete();
        $notification=array(
            'messege'=>'Blog Category Deleted Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

    public function editBlogCat($id)
    {
        $blogcat = DB::table('post_category')->where('id', $id)->first();

        return view('admin.blog.category.edit', compact('blogcat'));
    }

    public function updateBlogCat(Request $request, $id)
    {

        $validateData = $request->validate([
            'category_name_en' => 'required|max:255',
            'category_name_am' => 'required|max:255' 
        ]);

        $data = array();
        $data['category_name_en'] = $request->category_name_en;
        $data['category_name_am'] = $request->category_name_am;

        $update = DB::table('post_category')->where('id', $id)->update($data);
        if($update){
            $notification=array(
                'messege'=>'Blog Category Deleted Successfully',
                'alert-type'=>'success'
                );
        }else{
            $notification=array(
                'messege'=>'Nothing Update',
                'alert-type'=>'success'
                );
        }
        return Redirect()->route('blog.categorylist')->with($notification);
    }

}

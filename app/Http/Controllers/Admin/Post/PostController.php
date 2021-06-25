<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
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
                'messege'=>'Blog Category Updated Successfully',
                'alert-type'=>'success'
                );
        }else{
            $notification=array(
                'messege'=>'Nothing Update',
                'alert-type'=>'error'
                );
        }
        return Redirect()->route('blog.categorylist')->with($notification);
    }

    public function createPost()
    {
        $blogcats = DB::table('post_category')->get();
        return view('admin.blog.post.create', compact('blogcats'));
    }

    public function displayBlogs()
    {
        $posts = DB::table('posts')
                    ->join('post_category', 'posts.category_id','post_category.id')
                    ->select('posts.*', 'post_category.category_name_en')
                    ->get();
                // return response()->json($posts);
                return view('admin.blog.post.index', compact('posts'));
    }

    public function storePost(Request $request)
    {
         $data = array();
         $data['post_title_en'] = $request->post_title_en;
         $data['post_title_am'] = $request->post_title_am;
         $data['category_id'] = $request->category_id;
         $data['details_en'] = $request->details_en;
         $data['details_am'] = $request->details_am;

         $post_image = $request->file('post_image');

         if($post_image){

            $post_image_name = hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
            Image::make($post_image)->resize(400,200)->save('media/post/'.$post_image_name); 
            
            $data['post_image'] = 'media/post/'.$post_image_name;

        
            
            DB::table('posts')->insert($data);
   
               $notification=array(
                   'messege'=>'Post Added Successfully',
                   'alert-type'=>'success'
                   );
               return Redirect()->route('all.blogpost')->with($notification);
           }else{
               $data['post_image'] = '';
               DB::table('posts')->insert($data);
   
               $notification=array(
                   'messege'=>'Post Added without Image',
                   'alert-type'=>'success'
                   );
                   return Redirect()->route('all.blogpost')->with($notification);
           }


        }

        public function deleteBlogPost($id)
        {
            $post = DB::table('posts')->where('id', $id)->first();
             $post_image = $post->post_image;  
                
                unlink($post_image);
                DB::table('posts')->where('id',$id)->delete();
                $notification=array(
                    'messege'=>'Post Deleted Successfully',
                    'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);

        }
        public function editPost($id)
        {   

            $post = DB::table('posts')->where('id', $id)->first();
            $blogcats = DB::table('post_category')->get();
                return view('admin.blog.post.edit', compact('post','blogcats'));
        }

        public function updatePost(Request $request, $id)
        {
            $oldImage = $request->old_image;

            $data = array();
            $data['post_title_en'] = $request->post_title_en;
            $data['post_title_am'] = $request->post_title_am;
            $data['category_id'] = $request->category_id;
            $data['details_en'] = $request->details_en;
            $data['details_am'] = $request->details_am;

            $post_image = $request->file('post_image');

            if($post_image){
                unlink($oldImage);
                $post_image_name = hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
                Image::make($post_image)->resize(400,200)->save('media/post/'.$post_image_name); 
                
                $data['post_image'] = 'media/post/'.$post_image_name;

                DB::table('posts')->where('id', $id)->update($data);
    
                $notification=array(
                    'messege'=>'Post Updated Successfully',
                    'alert-type'=>'success'
                    );
                return Redirect()->route('all.blogpost')->with($notification);
            }else{
                $data['post_image'] = $oldImage;
                DB::table('posts')->where('id', $id)->update($data);
    
                $notification=array(
                    'messege'=>'Post Updated without Image',
                    'alert-type'=>'success'
                    );
                    return Redirect()->route('all.blogpost')->with($notification);
            }
        }

}

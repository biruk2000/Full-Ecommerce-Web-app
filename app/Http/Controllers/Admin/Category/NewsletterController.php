<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class NewsletterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function newsletter()
    {
        $newsletters = DB::table('newsletters')->get();
        return view('admin.newsletter.newsletter', compact('newsletters'));
    }

    public function deleteNewsletter($id)   
    {
         DB::table('newsletters')->where('id', $id)->delete();
         $notification=array(
            'messege'=>'Subscriber Deleted Successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);

    }
}

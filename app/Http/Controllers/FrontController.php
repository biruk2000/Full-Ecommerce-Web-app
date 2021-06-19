<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FrontController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }

    public function storeNewsletter(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|unique:newsletters|max:55',
        ]);

        $data = array();
        $data['email'] = $request->email;
        DB::table('newsletters')->insert($data);

        $notification=array(
            'messege'=>'Thanks for Subscribing',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }
}

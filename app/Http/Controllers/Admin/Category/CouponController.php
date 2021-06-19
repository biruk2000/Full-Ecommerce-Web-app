<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Coupon;
use DB;

class CouponController extends Controller
{
   public function __construct(){
       $this->middleware('auth:admin');
   }

    public function coupon()
    {
        $coupons = DB::table('coupons')->get();
        return view('admin.coupon.coupon', compact('coupons'));
    }

    public function storeCoupon(Request $request)   
    {

        $validateData = $request->validate([
            'coupon' => 'required',
            'discount' => 'required'
        ]);

        $data = array();
        $data['coupon'] = $request->coupon;
        $data['discount'] = $request->discount;

        DB::table('coupons')->insert($data);

        $notification=array(
            'messege'=>'Coupon Added Successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }

    public function deleteCoupon($id)
    {
        // $coupon = Coupon::find($id);
        // $coupon->delete();

        DB::table('coupons')->where('id', $id)->delete();

        $notification=array(
            'messege'=>'Coupon Deleted Successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);

    }

    public function editCoupon($id)
    {
        $coupon = DB::table('coupons')->where('id', $id)->first();
        return view('admin.coupon.edit_coupon', compact('coupon'));
    }

    public function updateCoupon(Request $request, $id)
    {
        $validateData = $request->validate([
            'coupon' => 'required',
            'discount' => 'required'
        ]);

        $data = array();
        $data['coupon'] = $request->coupon;
        $data['discount'] = $request->discount;

       $update = DB::table('coupons')->where('id', $id)->update($data);
       
       if($update) {
            $notification = array(
                'messege' => 'Coupon Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('admin.coupon')->with($notification);
       }else{
            $notification=array(
                'messege' => 'Nothing To Update',
                'alert-type' => 'error'
            );
            return Redirect()->route('admin.coupon')->with($notification);
       }
    }
}

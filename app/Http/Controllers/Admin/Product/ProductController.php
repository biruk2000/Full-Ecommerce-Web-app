<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        
    }

    public function addProduct()
    {
        $categories = DB::table('categories')->get();
        $brands = DB::table('brands')->get();
 
        return view('admin.product.create', compact('categories', 'brands'));
    }

    public function getSubCategories($category_id)
    {
        $subCategories = DB::table('subcategories')->where('category_id', $category_id)->get();

        return json_encode($subCategories);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('layouts.front');
    }
    
    public function landing(){
        $products = Product::where('product_name','WPPE')->orWhere('product_name','WPPE-P')->get();
        return view('layouts.landingpage',compact('products'));
    }
    
    public function landing2(){
        $products = Product::where('product_name','special class')->get();
        $productlain = Product::where('product_name','WPPE')->orWhere('product_name','WPPE-P')->get();
        return view('layouts.landingpage2',compact('products','productlain'));
    }
    
    public function aboutus()
    {
        return view('user.aboutus');
    }
}
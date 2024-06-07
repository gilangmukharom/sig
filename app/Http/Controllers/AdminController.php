<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Coupon;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    
    public function akun()
    {
        $users = User::latest()->get();
        return view('admin.user.index',compact('users'));
    }
    public function order()
    {
        $orders = Order::latest()->get();
        return view('admin.order.index',compact('orders'));
    }
     public function adminproduct()
    {
        $products = Product::latest()->get();
        return view('admin.product.index',compact('products'));
    }

    public function createproduct()
    {
        return view('admin.product.create');
    }

    public function storeproduct(Request $request)
    {
        $products = Product::create([
            'product_name' => $request->product_name,
            'product_desc' => $request->product_desc,
            'harga'        => $request->harga
        ]);

        if($products)
        {
            return redirect()->route('adminproduct')->with('success','Data Berhasil Tersimpan !');
        }
        else{
            return redirect()->route('adminproduct')->with('error','Data Gagal Tersimpan !');
        }
    }

    public function editproduct($id)
    {
        $products = Product::find($id);
        return view('admin.product.edit',compact('products'));
    }
    public function updateproduct(Request $request,$id)
    {
        $products = Product::find($id);
        $products->update([
            'product_name' => $request->product_name,
            'product_desc' => $request->product_desc,
            'harga'        => $request->harga
        ]);
        if($products)
        {
            return redirect()->route('adminproduct')->with('success','Data Berhasil Terupdate !');
        }
        else{
            return redirect()->route('adminproduct')->with('error','Data gagal terupdate !');
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('adminproduct')->with('error', 'Product not found.');
        }
        $product->delete();

        return redirect()->route('adminproduct')->with('success', 'Product deleted successfully.');
    
    }

    public function voucher()
    {
        $coupons = Coupon::all();
        return view('admin.voucher.index',compact('coupons'));
    }

    public function createvoucher()
    {
        return view('admin.voucher.create');
    }

    public function storevoucher(Request $request)
    {
        $coupons = Coupon::create([
            'code' => $request->code,
            'discount' =>$request->discount
        ]);

        if($coupons)
        {
            return redirect()->route('voucher')->with('success','Code Berhasil di Tambahkan !');
        }
        else{
            return redirect()->route('voucher')->with('error','Code Gagal di Tambahkan !');
        }
    }

    public function editvoucher($id)
    {
        $coupons = Coupon::find($id);
        return view('admin.voucher.edit',compact('coupons'));
    }

    public function updatevoucher(Request $request,$id)
    {
        $coupons = Coupon::find($id);
        $coupons->update([
            'code'  => $request->code,
            'discount' => $request->discount
        ]);

        if($coupons)
        {
            return redirect()->route('voucher')->with('success','Data Berhasil di Update !');
        }
        else{
            return redirect()->route('voucher')->with('error','Data Gagal di Update !');
        }
    }
    public function destroyVoucher($id)
    {
        $coupons = Coupon::find($id);
        
        if(!$coupons){
            return redirect()->route('voucher')->with('error','Data Tidak Ada !');
        }

        $coupons->delete();
        return redirect()->route('voucher')->with('success','Data Berhasil di Hapus');
    }
}


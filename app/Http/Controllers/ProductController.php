<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Auth;
use App\Models\Order;
use App\Models\Coupon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('product_name','WPPE')->orWhere('product_name','WPPE-P')->get();
        return view('user.siginstitute', compact('products'));
    }

    public function add_cart($id)
    {
       $products = Product::findOrFail($id);
       
       $promoCode = Coupon::where('product_id', $id)->whereNull('user_id')->first();
       $harga_diskon = $promoCode ? $products->harga - ($promoCode) : $products->harga;

    // Cek apakah ada diskon yang berlaku
    $cart[$id] = [
        "id" => $products->id,
        "user_name" => Auth::user()->name,
        "user_email" => Auth::user()->email,
        "product_name" => $products->product_name,
        "product_desc" => $products->product_desc,
        "harga_awal" => $products->harga,
        "harga_diskon" => $harga_diskon, // Memperbarui nilai harga_diskon
        'quantity' => 1
    ];
    session()->put('cart', $cart);
    return redirect('cart')->with('success', 'Berhasil Menambah Kelas!');
    }

    public function cart()
    {
        $cart = Session()->get('cart');
        return view('user.cart', compact('cart'));
    }

    public function remove(Request $request)
    {   
       if($request->id){
        $cart = Session()->get('cart');
        if(isset($cart[$request->id])){
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }
        session()->flash('success','Kelas Sudah Dihapus !');
       }
    }
    public function applyPromo(Request $request)
        {
           $harga = session()->get('cart');
            $code = $request->input('promo_code');
            $user = Auth::user();
    
            $promoCode = null;
           foreach($harga as $key => $item)
            {
                if($item['product_name'] == 'Special Class')
                {
                    $promoCode = Coupon::where('code', $code)->whereNull('used_at')->first();
                }
                else{
                    $promoCode = Coupon::where('code', $code)->first();
                }
            }
    
            if ($promoCode) {
                foreach ($harga as $key => $item) {
                    if ($promoCode->discount) {
                        $harga[$key]['harga_diskon'] -= $promoCode->discount;
                    }
                }
    
                // Simpan nilai diskon terbaru ke dalam sesi agar dapat diakses di tempat lain
                session()->put('cart', $harga);
    
                // Set user_id pada voucher
                $promoCode->user_id = auth()->id(); // Menggunakan ID pengguna yang sedang login
                $promoCode->used_at = now();
                $promoCode->save();
    
                session()->flash('success', 'Promo Diterapkan');
            } else {
                session()->flash('error', 'Promo tidak valid atau sudah digunakan.');
            }
    
            return redirect()->back();
        }

    public function detail(Request $request)
    {
        $cart = Session()->get('cart');
        foreach($cart as $item)
        {
          $orders = Order::create([
            'id'         => rand(),
            'product_id' => $item['id'],
            'user_id'    => $request->user_id,
            'total_harga'=> $request->total_harga,
            'diskon'     => $request->diskon
        ]);
        if($orders)
        {
            return redirect()->route('checkout',$orders->id)->with(['success' => 'data berhasil disimpan']);
        }
        else{
            return redirect()->route('cart')->with(['error' => 'gagal menyimpan data']);
        }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
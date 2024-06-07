<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Order;


class CheckoutController extends Controller
{
    
    public function index(Request $request,$id){
        $orders = Order::findorFail($id);
        $request->session()->forget('cart');
        \Midtrans\Config::$serverKey = 'Mid-server-UJL8yt4WQ6W81eu-oqKt3jJH';
        \Midtrans\Config::$clientKey = 'Mid-client-ZcODSeM34iMlSi-o';


        // Uncomment for production environment
        Config::$isProduction = true;

        // Enable sanitization
        \Midtrans\Config::$isSanitized = true;

        // Enable 3D-Secure
        \Midtrans\Config::$is3ds = true;

        // Uncomment for append and override notification URL
        // Config::$appendNotifUrl = "/invoice";
         // Config::$overrideNotifUrl = "/invoice";

        // Required
        
        $transaction_details = array(
        'order_id' => $orders->id,
        'gross_amount' => $orders->total_harga, // no decimal allowed for creditcard
        );

        // Optional
        $item1_details = array(
        'id' => $orders->id,
        'price' => $orders->total_harga,
        'quantity' => 1,
        'name' => $orders->product->product_name
        );

        // Optional
        $item_details = array ($item1_details);

        // Optional
        $billing_address = array(
            'first_name'    => "Saudara",
            'last_name'     => $orders -> user -> name,
            'address'       => $orders -> user -> alamat,
            'city'          => $orders ->kota,
            'postal_code'   => $orders ->kodepos,
            'phone'         => $orders -> user -> phone,
            'country_code'  => 'IDN'
        );
        // Optional
        $customer_details = array(
        'first_name'    => "Saudara",
        'last_name'     => $orders -> user -> name,
        'email'         => $orders -> user -> email,
        'phone'         => $orders -> user -> phone,
        'billing_address'  => $billing_address,
        );

        // Fill transaction details
        $transaction = array(
        'transaction_details' => $transaction_details,
        'customer_details' => $customer_details,
        'item_details' => $item_details,
        );

        $snap_token = '';
        try {
        $snap_token = \Midtrans\Snap::getSnapToken($transaction);
        }
        catch (\Exception $e) {
        echo $e->getMessage();
        }
        return view('user.checkout',compact('orders','snap_token'));
    }

    public function callback(Request $request)
    {
       $serverKey = 'Mid-server-UJL8yt4WQ6W81eu-oqKt3jJH';
       $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
       $payment_type = $request->payment_type;
       $va_number = $request->va_numbers;
       
       if($hashed == $request->signature_key){
        if($request->transaction_status == 'settlement')
        {
            $order = Order::find($request->order_id);
            $order->update(['status' => "Paid"]);
        }
        elseif($request->transaction_status == 'pending')
        {
            $order = Order::find($request->order_id);
            if($payment_type == "bank_transfer")
            {
            $order->update(['status' => "Pending",
                            'payment_type' =>$payment_type,
                            'bank'         =>$va_number[0]['bank'],
                            'va_number'   =>$va_number[0]['va_number']
            ]);
            }
            else{
                $order->update([
                    'status' => 'pending',
                    'payment_type' => $payment_type]);
            }
        }
        elseif($request->transaction_status == 'denied')
        {
            $order = Order::find($request->order_id);
            $order->update(['status' => 'Ditolak']);
        }
        elseif($request->transaction_status == 'expire')
        {
            $order = Order::find($request->order_id);
            $order->update(['status' => 'Kadaluarsa']);
        }
       }
    }

    public function invoice($id)
    {
        $order = Order::find($id);
        return view('user.invoice',compact('order'));
    }
}
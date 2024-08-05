<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Auth;

class AnalyzeController extends Controller
{
    public function index()
    {
        return view('analyze.home');
    }
    public function login()
    {
        return view('auth.analyze-login');
    }

    public function signup()
    {
        return view('auth.analyze-signup');
    }

    public function paymentAndBilling()
    {
        return view('analyze.paymentAndBilling', ['title' => 'Payment and Billing']);
    }
}
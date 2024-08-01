<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Auth;

class AnalyzeDashboardController extends Controller
{
    public function index()
    {
        return view('analyze.dashboard');
    }
}
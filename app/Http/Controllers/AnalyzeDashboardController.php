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

    public function setting()
    {
        return view('analyze.settings', ['title' => 'Settings']);
    }

    public function profileUser()
    {
        return view('analyze.profile', ['title' => 'Profile']);
    }
}
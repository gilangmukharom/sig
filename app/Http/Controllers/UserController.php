<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $daftaruser = User::latest()->get();
        return view('admin.user.index',compact('daftaruser'));
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index()
    { 
        $akun = User::getAllAkun()->get();
        return view('admin.akun.akun_view', compact('akun'));
    }
}

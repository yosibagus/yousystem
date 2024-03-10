<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\MatkulModel;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    public function index()
    { 
        $matkul = MatkulModel::all();
        return view('admin.matkul.matkul_view', compact('matkul'));
    }
}

<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\KelasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $detail = KelasModel::where('id_kelas', Auth::user()->kelas_id)->first();
        return view('user.profile.profile_view', compact('detail'));
    }
}

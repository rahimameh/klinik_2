<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dokter;
use App\Pasien;
use App\User;
use App\Antrian;
use Carbon\carbon;
class DashController extends Controller
{
    public function index(){
        $antrian=Antrian::whereDate('created_at', '=', Carbon::today())->count();
        $pasien= Pasien::count();
        $dokter= Dokter::count();
        $user= User::count();
        return view('dashboard',compact('pasien','dokter','user','antrian'));
    }
}

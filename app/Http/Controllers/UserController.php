<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
       //bikin variable datapasien bwt ambil data dari Model Pasien yg ngambil table pasien di database,lalu urut ascending
       $users = User::orderBy('id')->paginate(5);
       //passing ke folder diview yg pasien.blade.php,[bikin array 'key string nya namanya pasien,isi dari keynya $datapasien
       return view ('pengguna.pengguna', ['users' => $users]);
    }
    public function delete($id)
    {    $users = User::find($id);
        $users->delete();
        return redirect('/pengguna');
    }
}

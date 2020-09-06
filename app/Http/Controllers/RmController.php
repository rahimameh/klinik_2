<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rekammedis;
use App\Pasien;
use App\Dokter;
use App\User;
use Auth;
class RmController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index($id)
    {
        $user= Auth::user()->name;
        $pasien=Pasien::findOrFail($id);
       
        return view('rekammedis.rm',compact('pasien','user'));
    }

    public function tambahrm( Request $request,$id)
    { 
        $pasien = Pasien::findOrFail($id);
        $rm = $pasien->rm();
        
        return view ('rekammedis.tambahrm',compact('pasien','rm'));
    
    }

    public function store (Request $request) 
    {        
        $user= Auth::user();//masukkin user
        $pasien = Pasien::where('id',$request->get('id'))->first();//pilih id
        $pasien_id=$pasien->id; //ambil id dari pasien
        $rm_pasien=$pasien->rm();//buka relasi rekammedis si pasien
        $hitung= $rm_pasien->count()+1;//hitung data rekammedis si pasien
        $id_rm = $pasien_id.'-'.$hitung; //jadikan id pasien dan jumlah rmnya sbg id rm
        $rm =$rm_pasien->create([
                'id_rm' => $id_rm,
                'pasien_id' =>$pasien_id,
                'keluhan'=> $request->keluhan,
                'diagnosis' => $request->diagnosis,
                'theraphy'=>$request->theraphy,
                'user_id'=> $user->id
            ]);
            
        return redirect()->route('rm',$pasien);
    }

    public function filter(Request $request,$id)
    {   
        // $user= Auth::user()->name;
        // $pasien=Pasien::findOrFail($id);
       
           $filter = $request->filter;
        $id= $request->id;
        $filtertanggal = Rekammedis::where('pasien_id','like',"".$id."")
                                    ->where(\DB::raw("DATE(created_at)"),'like',"%" . $filter . "%")
                                    ->get();
                                    
                        //   return redirect()->route('rm',$filtertanggal);/////////UDAH BISAAA TAPIIIIIIIIIII VIEW NYA D TARO DMNA
    }
       
}
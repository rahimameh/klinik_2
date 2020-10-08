<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rekammedis;
use App\Pasien;
use App\Dokter;
use App\User;
use Carbon\Carbon;
use Auth;
use PDF;

class RmController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index(Request $request,$id)
    {
        
        $pasien=Pasien::findOrFail($id);
        
       
        return view('rekammedis.rm',compact('pasien'));
        // return dd($pasien);
    }

    public function tambahrm($id)
    { 
        $pasien = Pasien::findOrFail($id);
        $rm = $pasien->rm();
        
        
        return view ('rekammedis.tambahrm',compact('pasien','rm'));
    
    }

    public function store (Request $request) 
    {        
        $user= Auth::user();//masukkin user
        $pasien = Pasien::where('id',$request->get('id'))->first();//ambil pasien yg id nya kaya yg d ambil si request
        $pasien_id=$pasien->id; //ambil idnya
        $rm_pasien=$pasien->rm();//ambil relasinya
        $hitung= $rm_pasien->count()+1;//hitung data rekammedis si pasien
        $id_rm = $pasien_id.'-'.$hitung; //jadikan id pasien dan jumlah rmnya sbg id rm
        $rm =$rm_pasien->create([
                'id' => $id_rm,
                'pasien_id' =>$pasien_id,
                'keluhan'=> $request->keluhan,
                'diagnosis' => $request->diagnosis,
                'theraphy'=>$request->theraphy,
                'user_id'=> $user->id
            ]);
            
        return redirect()->route('rm',$pasien)->with(['success' => 'Data berhasil ditambahkan']);
    }

    public function riwayat_rm()
    {
        $rm= Rekammedis::orderBy('created_at')->paginate(5);
        
       
        return view('rekammedis.riwayat_rm',compact('rm'));
    }
    public function cetak(Request $request,$id)
    {           
            $pasien=Pasien::findOrFail($id);
          	$pdf = PDF::loadview('rekammedis.form_rm',compact('pasien'));
    	return $pdf->stream();
    }

    public function edit($id)
    {
           
            $pasien = Rekammedis::findOrFail($id);
       
        // return dd($rm);
            //  lempar ke folder pasien file edit blade
             return view ('rekammedis.edit',compact('pasien'));
    }        

    // proses form edit,query request ntuk menarik data dari id 
    public function update($id, Request $request)
    {
            $this->validate($request,[
            'id' => 'required',
            'keluhan'=>'required',
            'diagnosis' => 'required',
            'theraphy' => 'required'
            ]);
        
            $pasien = Rekammedis::findOrFail($id);
            $pasien->update($request->all());

            return redirect()->route('rm',$pasien->pasien_id)->with(['success' => 'Data berhasil diedit']);
    }

        // proses hapus
    public function delete($id)
    {   $pasien = Rekammedis::findOrFail($id);
       
        $pasien->delete();
       
        return redirect()->route('rm',$pasien->pasien_id)->with(['erorr' => 'Data berhasil dihapus']);
    }

    public function rmku($id){
        
        $user=Auth::user()->id;
        $pasien= Pasien::where('user_id',$user)->first()->id;
        return redirect()->route('rm',$pasien);
        // return view('layout.include._sidebar',compact('pasien'));
       
    }
    

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
// pasangin k model pasien
use App\Pasien;
use App\User;
use App\Rekammedis;
use PDF;
use Carbon\Carbon;

class PasienController extends Controller
{
        // pasang fungsi index biar bsa dpanggil d route
    public function index()
     {
        //bikin variable datapasien bwt ambil data dari Model Pasien yg ngambil table pasien di database,lalu urut ascending
        $pasien = Pasien::orderBy('nama')->paginate(5);
        //passing ke folder diview yg pasien.blade.php,[bikin array 'key string nya namanya pasien,isi dari keynya $datapasien
        return view ('pasien.pasien', ['pasien' => $pasien]);
     }
        // pasang fungsi tambah
    public function tambah()
    {
        //lempar ke tampilan view tambah di folder pasien
        return view('pasien.tambah');
    }

        // buat memproses inputan di tambah
    public function store (Request $request)//depidensi,Request $request hapus, dibawahnya jangan $request,ganti Request::
    {   
        $this->validate($request,[
            'nama' => 'required',
            'gender'=>'required',
            'umur' => 'required',
            'alamat' => 'required',
            'email'=>'required'
            ]);

//act,sequence,pake fork

        $user = new \App\User;//compotition
        $user->role = 'pasien';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt ('rahasia');
        $user->remember_token = Str::random(30);
        $user->save();

       
        $hurufDepan=Str_split($request->nama)[0];
        $jmlPasien=pasien::where('nama','like',$hurufDepan.'%')->count() + 1;
        $id_pasien = $hurufDepan.$jmlPasien;

    $request->request->add(['user_id' => $user->id ]);
    $request->request->add(['id' => $id_pasien ]);
      $pasien= Pasien::create($request->all());
    
            return redirect('/pasien')->with(['success' => 'Data berhasil ditambahkan']);
    }
    // mengambil data pegawai berdasarkan id nya
    public function edit($id)
    {
            // bikin variable $pasien buat naro data yg dipanggil berdasarkan id d database lewat model 
             $pasien = Pasien::find($id);
             
            //  lempar ke folder pasien file edit blade
             return view ('pasien.edit',['pasien'=> $pasien]);
    }        

    // proses form edit,query request ntuk menarik data dari id 
    public function update($id, Request $request)
    {
            $this->validate($request,[
            'nama' => 'required',
            'umur'=>'required',
            'gender' => 'required',
            'alamat' => 'required'
            ]);
        
            $pasien= Pasien::find($id);
            $pasien->update($request->all());
         
            $user_id= $pasien->user()->update([
            'name'=>$request->nama,
            'email' => $request->email
            ]);
           

            return redirect('/pasien')->with(['success' => 'Data berhasil diedit']);
    }

        // proses hapus
    public function delete($id)
    {    $pasien = Pasien::find($id);
        $rm= $pasien->rm();
        $user_id= $pasien->user();
//ketika data pasien dihapus,maka data usernya,data rekammedisnya ikut terhapus
        $pasien->delete();
        $rm->delete();
       $user_id->delete();
        return redirect('/pasien')->with(['error' => 'Data berhasil dihapus']);
    }


    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pasien sesuai pencarian data
		$pasien = Pasien::where('nama','like',"%".$cari."%")
        ->paginate(5);

        return view('pasien.pasien',compact('pasien'))->with(['error' => 'Data berhasil ditemukan']);
       
    }

    // public function cetak_pdf()
    // {
    // 	$pasien = Pasien::all();
 
    // 	$pdf = PDF::loadview('pasien.pasien_pdf',['pasien'=>$pasien]);
    // 	return $pdf->stream();
    // }

  
}

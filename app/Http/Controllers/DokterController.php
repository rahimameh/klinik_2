<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Dokter;
use App\User;
class DokterController extends Controller
{
    public function index()
    {
        $datadokter=Dokter::all()->sortBy('nama');
        return view('dokter.dokter',['dokter'=>$datadokter]);
    }

    public function tambah()
    {
        return view ('dokter.tambah');
    }

    public function store( Request $request)
    {
        $user = new \App\User;
        $user->role = 'dokter';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt ('rahasia');
        $user->remember_token = Str::random(30);
        $user->save();

       
        $hurufDepan=('Dokter');
        $jmlDokter=Dokter::count() + 1;
        $id_dokter = $hurufDepan.$jmlDokter;

        $request->request->add(['user_id' => $user->id ]);
        $request->request->add(['id' => $id_dokter ]);
       $pasien= Dokter::create($request->all());


        return redirect('/dokter')->with(['success' => 'Data berhasil ditambahkan']);;
    }

    public function edit ($id)
    {
        $dokter=Dokter::find($id);
        return view('dokter.edit',['dokter'=>$dokter]);
    }

    public function update($id, Request $request)
    {
            $this->validate($request,[
            'nama' => 'required',
            'gender'=>'required',
            'umur' => 'required',
            'alamat' => 'required'
            ]);
        
            $dokter =Dokter::find($id);
            $dokter->update($request->all());
            return redirect('/dokter')->with(['success' => 'Data berhasil diedit']);;
    }

        // proses hapus
    public function delete($id)
    {    $dokter = Dokter::find($id);
        $dokter->delete();
        return redirect('/dokter')->with(['error' => 'Data berhasil dihapus']);;
    }

}

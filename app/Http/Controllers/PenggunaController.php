<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengguna;
class PenggunaController extends Controller
{
    public function index()
    {
        $datapengguna=Pengguna::all()->sortBy('nama');
        return view('pengguna.pengguna',['pengguna'=>$datapengguna]);
    }

    public function tambah()
    {
        return view ('pengguna.tambah');
    }

    public function store( Request $request)
    {
        $this->validate($request,[
        'nama' => 'required',
        'gender'=>'required',
        'umur'=>'required',
        'alamat' => 'required'
        ]);

        $hurufDepan=Str_split($request->nama)[0];
        $jmlUser=Pengguna::where('nama','like',$hurufDepan.'%')->count() + 1;
        $id_pengguna = $hurufDepan.$jmlUser;


        Pengguna::create([
            'nama' => $request->nama,
            'umur'=> $request->umur,
            'gender'=> $request->gender,
            'alamat' => $request->alamat,
            'id'=>$id_pengguna
        ]);
        return redirect('/pengguna');
    }

    public function edit ($id)
    {
        $pengguna=Pengguna::find($id);
        return view('pengguna.edit',['pengguna'=>$pengguna]);
    }

    public function update($id, Request $request)
    {
            $this->validate($request,[
            'nama' => 'required',
            'gender'=>'required',
            'umur' => 'required',
            'alamat' => 'required'
            ]);
        
            $pengguna =Pengguna::find($id);
            $pengguna->update($request->all());
            return redirect('/pengguna');
    }

        // proses hapus
    public function delete($id)
    {    $pengguna = Pengguna::find($id);
        $pengguna->delete();
        return redirect('/pengguna');
    }
}

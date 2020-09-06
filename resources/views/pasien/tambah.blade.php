@extends('layout.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="conteiner-fluid">
            <div class="row">
                <div class="col-nd-12">
                    <div class="panel">
						<div class="panel-heading">
						    <h2>Tambah Data Pasien</h2>
							<div class="panel-body">
                                <form method="post" action="/pasien/store">
                                    {{ csrf_field() }}
                                     <div class="form-group">
                                  <div class="col-md-6">
                                  <label>Nama</label><br>
                                        <input type="text" name="nama" class="form-control" autocomplete="off" placeholder="Nama pasien ..">
                                        @if($errors->has('nama'))
                                            <div class="text-danger">
                                                {{ $errors->first('nama')}}
                                            </div>
                                        @endif
                                    <br>
                                        <label>Umur</label>
                                    <br>
                                        <input type="number" name="umur" autocomplete="off" class="form-control" >
                                        @if($errors->has('umur'))
                                            <div class ="text-danger">
                                                {{$errors->first('umur')}}
                                            </div>
                                        @endif
                                        <br>
                                        <label>Gender</label>
                                    <br>
                                        <input type="radio" name="gender" value="p" />Perempuan<br>
                                        <input type="radio" name="gender" value="l" />Laki-laki 
                                        @if($errors->has('gender'))
                                            <div class ="text-danger">
                                                {{$errors->first('gender')}}
                                            </div>
                                            @endif
                                    <br>
                                  
                                  </div>
                                  <div class="col-md-6">
                                  <label>Alamat</label>
                                        <br>
                                        <textarea name="alamat" class="form-control" autocomplete="off" placeholder="Alamat pegawai .."></textarea>
                                        @if($errors->has('alamat'))
                                            <div class="text-danger">
                                                {{ $errors->first('alamat')}}
                                            </div>
                                        @endif
                                        <br>

                                        <label>Email</label><br>
                                        <input type="email" name="email" class="form-control" autocomplete="off" placeholder="..">
                                        @if($errors->has('email'))
                                            <div class="text-danger">
                                                {{ $errors->first('email')}}
                                            </div>
                                        @endif
                                       
                                        <br>
                                        <a href="/pasien" class="btn btn-info"><i class="fa fa-reply"></i>Kembali</a>
                                    <input type="submit" class="btn btn-success" value="Simpan">
                                        </div>
                                   
                                    </div>
                                    </div>  
                                   
                              </form> 
						
						</div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

@stop


@extends('layout.master')

@section('content')

<div class="main">
    <div class="main-content">
        <div class="conteiner-fluid">
            <div class="row">
                <div class="col-nd-12">
                    <div class="panel">
						<div class="panel-heading">
                                <h1><strong>EDIT DATA</strong></h1><br/>
                                <a href="/dokter" class="btn btn-primary">Kembali</a>
                                <br/>
						</div>
						<div class="panel-body">
                        <form method="post" action="/dokter/update/{{ $dokter->id }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" autocomplete="off" value=" {{ $dokter->nama }}">
                                @if($errors->has('nama'))
                                    <div class="text-danger">
                                        {{ $errors->first('nama')}}
                                    </div>
                                @endif
                            </div>         
                            <br>        
                            <div class="form-group">
                                <label>Umur</label>
                                <input type="text" name="umur" class="form-control" autocomplete="off" value=" {{ $dokter->umur}}">
                                @if($errors->has('umur'))
                                    <div class="text-danger">
                                        {{ $errors->first('umur')}}
                                    </div>
                                @endif
                            </div>   
                            <br>          
                            <div class="form-group">
                                <label>Gender</label><br>
                                <input type="radio" required="required" name="gender" value="p"{{ (old('gender', @$dokter->gender) == "p") ? "checked" : "" }} ">Perempuan<br/>
                                <input type="radio" required="required" name="gender" value="l" {{ (old('gender', @$dokter->gender) == "l") ? "checked" : "" }} ">Laki-laki 
                                @if($errors->has('gender'))
                                        <div class =>
                                            {{$errors->first('gender')}}
                                        </div>
                                @endif
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" autocomplete="off" placeholder="Alamat dokter .."> {{ $dokter->alamat }} </textarea>
                                @if($errors->has('alamat'))
                                    <div class="text-danger">
                                        {{ $errors->first('alamat')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" autocomplete="off" value=" {{ $dokter->user->email}}">
                                @if($errors->has('email'))
                                    <div class="text-danger">
                                        {{ $errors->first('email')}}
                                    </div>
                                @endif
                            </div>    
                            <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Simpan">
                            </div>
                            </div>
                        </form>
					</div>
				</div>
            </div> 
        </div>  
    </div>
@stop
    
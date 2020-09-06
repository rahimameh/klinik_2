@extends('layout.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="conteiner-fluid">
            <div class="row">
                <div class="col-nd-12">
                    <div class="panel">
						<div class="panel-heading">
						    <h2>    Tambah Rekam Medis</h2>
							<div class="panel-body">
                                  <form method="post" action="/rm/store">
                                    {{ csrf_field() }}
                                    <div class="form-group">          
                               
                                    <h3><label>ID PASIEN ANDA : </label><i class="text-success">{{$pasien->id}}</i></h3>
                                    <div class="col-md-4">
                                    <label>MASUKKAN ID PASIEN ANDA</label><br>
                               
                                        <textarea name="id" class="form-control" placeholder="MASUKKAN ID ANDA" ></textarea>                                                           
                                    <br>
                                        <label>Keluhan</label><br>
                                        <textarea name="keluhan" class="form-control"  ></textarea> 
                                               @if($errors->has('keluhan'))
                                            <div class="text-danger">
                                                {{ $errors->first('keluhan')}}
                                            </div>
                                        @endif
                                        </div>
                                        <div class="col-md-4">
                                        <label>Diagnosis</label>
                                        <br>
                                        <textarea name="diagnosis" class="form-control"></textarea>
                                        @if($errors->has('diagnosis'))
                                        <div class ="text-danger">
                                        {{$errors->first('diagnosis')}}
                                            </div>
                                            @endif
                                  
                                        <br>
                                        <label>Theraphy</label>
                                        <br>
                                        <textarea name="theraphy" class="form-control"></textarea>
                                        @if($errors->has('theraphy'))
                                            <div class="text-danger">
                                                {{ $errors->first('theraphy')}}
                                            </div>
                                        @endif
                                        <br>
                                    
                                    <input type="submit" class="btn btn-success" value="Simpan">
                                    </div>
                                </form> 
							</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop


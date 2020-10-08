@extends('layout.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="conteiner-fluid">
            <div class="row">
                <div class="col-nd-12">
                    <div class="panel">
						<div class="panel-heading">
                        @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	<i class="fa fa-check-circle"></i> {{ $message }}
	</div>
   @endif

    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
    <i class="fa fa-times-circle"></i>{{ $message }}
    </div>
    @endif
						    <h2> Edit Rekam Medis</h2>
							<div class="panel-body">
                            <form method="post" action="/rm/update/{{$pasien->id}}">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="form-group">          
                            
                                    <h3><label>ID PASIEN ANDA : </label><i class="text-success">{{$pasien->id}}</i></h3>
                                    <div class="col-md-4">
                                    <label>MASUKKAN ID PASIEN ANDA</label><br>
                   <input class="form-control" name="id" value="{{$pasien->id}}" id="id" readonly="readonly" placeholder="{{$pasien->id}}"></h1>
    <br>
                                        <label>Keluhan</label><br>
                                        <textarea name="keluhan" class="form-control" >{{$pasien->keluhan}}</textarea> 
                                               @if($errors->has('keluhan'))
                                            <div class="text-danger">
                                                {{ $errors->first('keluhan')}}
                                            </div>
                                        @endif
                                        </div>
                                        <div class="col-md-4">
                                        <label>Diagnosis</label>
                                        <br>
                                        <textarea name="diagnosis" class="form-control" >{{$pasien->diagnosis}}</textarea>
                                        @if($errors->has('diagnosis'))
                                        <div class ="text-danger">
                                        {{$errors->first('diagnosis')}}
                                            </div>
                                            @endif
                                  
                                        <br>
                                        <label>Theraphy</label>
                                        <br>
                                        <textarea name="theraphy" class="form-control" >{{$pasien->theraphy}}</textarea>
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


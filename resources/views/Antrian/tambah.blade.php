@extends('layout.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="conteiner-fluid">
            <div class="row">
                <div class="col-nd-12">
                    <div class="panel">
						<div class="panel-heading">
						    <h2>    Tambah Antrian</h2>
							<div class="panel-body">
                                  <form method="post" action="/antrian/store">
                                    {{ csrf_field() }}
                                    <div class="form-group">          
                                    <h3><label>ID user ANDA : </label><i class="text-success">{{$user->id}}</i></h3>
                                   
                                    <label>MASUKKAN ID User ANDA</label><br>
                                        <textarea name="id" value="{{Auth::user()->id}}" class="form-control" disabled placeholder="{{Auth::user()->id}}" ></textarea> 
                                         <label>Ambil antrian</label><br>
                                         <select  class="form-control input-lg" >
                                             <option name="antrian" id="antrian" value="antrian">{{$antrian}}</option>
                                         </select>
                                         
                                        <br>
                                    </div>
                                    <input type="submit" class="btn btn-success" value="Simpan">
                                </form> 
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop


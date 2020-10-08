@extends('layout.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="conteiner-fluid">
            <div class="row">
                <div class="col-nd-12">
                    <div class="panel">
						<div class="panel-heading">
						 
							<div class="panel-body">
                            <h1>Tambah Antrian</h1>
                                  <form method="post" action="/antrian/store">
                                    {{ csrf_field() }}
                                    <div class="form-group">   
                                    
                                    <label>ID PASIEN ANDA</label><br>
                   <input class="form-control" name="id" value="{{$pasien}}" id="id" readonly="readonly" placeholder="{{$pasien}}"></h1>
    <br>
                                    <div class="panel-body no-padding bg-primary text-center">
									<div class="padding-top-30 padding-bottom-30">
										<i class="fa fa-chevron-circle-down fa-5x"></i>
										<h3>AMBIL ANTRIAN DISINI</h3>
									</div>
								</div>            
<input class="form-control input-lg" style="text-align:center" name="antrian" value="{{$antrian}}" id="antrian" readonly="readonly" placeholder="{{$antrian}}"></h1>
                                         <br>
                                    </div>
                                    <input type="submit" class="btn btn-success btn-block" value="AMBIL">
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


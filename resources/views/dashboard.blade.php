@extends('layout.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="conteiner-fluid">
            <div class="row">
                <div class="col-nd-12">
                    <div class="panel">
                        <div class="panel-body">

						<div class="metric">
										<span class="icon"><i class="fa fa-users"></i></span>
										<p>
											<span class="number">{{$antrian}}</span>
											<span class="title">Antrian hari ini</span>
										</p>
									</div>
                        
                                     <div class="metric">
										<span class="icon"><i class="fa fa-user-md"></i></span>
										<p>
											<span class="number">{{$pasien}}</span>
											<span class="title">Pasien</span>
										</p>
									</div>

                                    <div class="metric">
										<span class="icon"><i class="fa fa-user"></i></span>
										<p>
											<span class="number">{{$dokter}}</span>
											<span class="title">Dokter</span>
										</p>
									</div>

                                    <div class="metric">
										<span class="icon"><i class="fa fa-users"></i></span>
										<p>
											<span class="number">{{$user}}</span>
											<span class="title">User</span>
										</p>
									</div>




                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
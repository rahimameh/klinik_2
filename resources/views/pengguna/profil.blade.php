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
										<span class="icon"><i class="fa fa-id-card"></i></span>
										<p>
											<span class="number">{{Auth::user()->id}}</span>
											<span class="title">ID</span>
										</p>
									</div>

                                    <div class="metric">
										<span class="icon"><i class="fa fa-user"></i></span>
										<p>
											<span class="number">{{Auth::user()->name}}</span>
											<span class="title">NAMA</span>
										</p>
									</div>

                                    <div class="metric">
										<span class="icon"><i class="fa fa-user-md"></i></span>
										<p>
											<span class="number">{{Auth::user()->role}}</span>
											<span class="title">ROLE</span>
										</p>
									</div>
                                    <div class="metric">
										<span class="icon"><i class="fa fa-at"></i></span>
										<p>
											<span class="number">{{Auth::user()->email}}</span>
											<span class="title">EMAIL</span>
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
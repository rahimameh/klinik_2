@extends('layout.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="conteiner-fluid">
            <div class="row">
                <div class="col-nd-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h1>Rekam Medis</h1>
                            <a href="/rm/tambahrm/{{$pasien->id}}" class="btn btn-primary"><i class="fa fa-plus"></i>Input data </a>
                            <h3><label>ID Pasien : </label><i class="text-success" id="id" name="id">{{$pasien->id}}</i></h3>
                            <h3><label>Nama Pasien   : </label><i class="text-success">    {{$pasien->nama}}</i></h3>
                            <div class="col-md-4">
                                <!-- <form action="/rm/filter/{{$pasien->id}}" method="GET"> -->
                            <input type="date" name="filter" id="filter">
                            <a href="/rm/filter/{{$pasien->id}}" class="fa fa-search"></a>
                            <br>
                                 <!-- @if(auth()->user()->role == 'dokter') -->
                                     
                                       </div> 
                                    <!-- @endif                                                              -->
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th >No</th>
                                            <th>Dokter</th>
                                            <th>Id Rekam Medis</th>
                                            <th>Keluhan</th>
                                            <th>Diagnosis</th>
                                            <th>Theraphy</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0;?>
                                     <!-- masuk ke id nya,yg relasi'in rm()-->
                                        @foreach($pasien->rm as $r)
                                        <?php $no++ ;?>
                                          <tr>
                                                <td>{{ $no}}</td>
                                                <td>{{$r->user_id}}</td>
                                                <td>{{$r->id_rm}}</td>                                     
                                                <td>{{$r->keluhan}}</td>
                                                <td>{{$r->diagnosis}}</td>
                                                <td>{{$r->theraphy}}</td>
                                                <td>{{$r->created_at->format('d, M Y')}}</td>
                                                @endforeach
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            
            </div>
        </div>
    </div>
</div>
@stop

@extends('layout.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="conteiner-fluid">
        <div class="row">
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
                        <h1>Rekam Medis</h1>
                 @if(auth()->user()->role == 'dokter')
                            <a href="/rm/tambahrm/{{$pasien->id}}" class="btn btn-primary"><i class="fa fa-user-plus"></i>input</a>
                            @endif
                @if(auth()->user()->role == 'admin')
                            <a href="/rm/{{$pasien->id}}/cetak" class="btn btn-primary"><i class="fa fa-print"></i>cetak form rekam medis</a>
@endif

                            <h2><span class="label label-warning" id="id" name="id">ID pasien = {{$pasien->id}}</span>
                            <span class="label label-info">Nama pasien = {{$pasien->nama}}</span></h2><br><br><br>
                          
                                <div class="table-responsive">
    
                                <table class= "table table-hover" style="width:100%" >
                                    <thead>
                                        <tr>
                                            <th style="width:1%; text-align:center;">No</th>
                                            <th style="width:7%; text-align:center;">Dokter</th>
                                            <th style="width:4%; text-align:center;">Id_Rm</th>
                                            <th style="width:19%; text-align:center;">Keluhan</th>
                                            <th style="width:20%; text-align:center;" >Diagnosis</th>
                                            <th style="width:20%;text-align:center;">Theraphy</th>
                                            <th style="width:10%; text-align:center;" >Tanggal</th>
                                            @if(auth()->user()->role == 'dokter')
                                            <th style="width:19%; text-align:center;" >Opsi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0;?>
                                     <!-- masuk ke id nya,yg relasi'in rm()-->
                                        @foreach($pasien->rm as $r)
                                        <?php $no++ ;?>
                                          <tr>
                                                <td style="word-break:break-all;text-align:center;">{{ $no}}</td>
                                                <td style="word-break:break-all;text-align:center;">{{$r->user->name}}</td>
                                                <td style="word-break:break-all;text-align:center;" >{{$r->id}}</td>                                     
                                                <td style="word-break:break-all;text-align:center;">{{$r->keluhan}}</td>
                                                <td style="word-break:break-all;text-align:center;">{{$r->diagnosis}}</td>
                                                <td style="word-break:break-all;text-align:center;">{{$r->theraphy}}</td>
                                                <td style="word-break:break-all;text-align:center;" >{{$r->created_at->format('d, M Y')}}</td>
                                                @if(auth()->user()->role == 'dokter')
                                                <td style="text-align:center;">
                                                <a href="/rm/edit/{{$r->id}}" class="btn btn-primary"><i class="fa fa-user-edit"></i>edit</a>
                                                <a href="/rm/delete/{{$r->id}}" class="btn btn-danger" onclick="return confirm('yakin ingin dihapus')"><i class="fa fa-user-trash"></i>Hapus</a>
                                               
                                                </td>
                                                @endif
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

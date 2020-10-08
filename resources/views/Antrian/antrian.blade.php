@extends('layout.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="conteiner-fluid">
            <div class="row">
                
                    <div class="panel">
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
                        <div class="panel-heading">
                            <h1>Daftar Antrian</h1><br>
                            
      <!-- ini buat pasien --> @if(auth()->user()->role == 'pasien')
                                <div class="panel-body no-padding bg-primary text-center">
									<div class="padding-top-30 padding-bottom-30">
										<i class="fa fa-chevron-circle-down fa-5x"></i>
										<h3>HALOO,,, {{$user->name}}<br></h3>
									</div>
								</div><br>
                                 <div class="panel-body no-padding bg-primary text-center">
									<div class="padding-top-30 padding-bottom-30">
										<i class="fa fa-chevron-circle-down fa-5x" name="antrian" id="antrian"></i>
										<h3>ANTRIAN SAAT INI {{$no_antrian}}<br></h3>
									</div>
								</div><br>
                            
                            <a href="/antrian/tambah/{{$user->id}}" class="btn btn-primary btn-block"><i class="fa fa-plus"></i>Ambil Antrian </a>
@endif
@if(auth()->user()->role != 'pasien')

                                <table class=" table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id_Antri</th>
                                            <th>Nomor Antrian</th>
                                            <th>ID_pasien</th>
                                            <th>Nama Pasien</th>
                                            <th>Tanggal</th>
                                            <th>OPSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0;?>
                                     <!-- pengulangan,masukkan ke table pasien -->
                                     <!-- masukin data ke db antrian sesuai usernya -->
                                        @foreach($cek as $a)
                                        <?php $no++ ;?>
                                          <tr>
                                                <td>{{ $no}}</td>
                                                <td>{{$a->id}}</td>
                                                <td>{{$a->antrian}}</td>
                                                <td>{{$a->pasien_id}}</td>
                                                <td> {{$a->user->name}}</td>
                                                <td>{{ $a->created_at}}</td>
                                                <td>
                                                    <!-- gimana caranya jika udah ngeklik "hadir,maka,tombol di opsi ga keluar" -->
                                                <a href="/rm/{{$a->pasien_id}}" class="btn btn-primary"><i class="fa fa-user"></i>hadir</a>
                                                <a href="/antrian/delete/{{$a->id}}" class="btn btn-danger" onclick="return confirm('yakin ingin dihapus')">tidak hadir</a>
                                                                                               
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                        </div>
                    </div>
            
            </div>
        </div>
    </div>
</div>
@stop

@extends('layout.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="conteiner-fluid">
            <div class="row">
                <div class="col-nd-12">
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
                            <h1>Data Dokter</h1>
                            <a href="/dokter/tambah" class="btn btn-primary" >Input data dokter</a>
                            <div class="panel-body">
                                <table class=" table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Umur</th>
                                            <th>Gender</th>
                                            <th>Alamat</th>
                                            <th>ID Dokter</th>
                                            <th>OPSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0;?>
                                     <!-- pengulangan,masukkan ke table pasien -->
                                        @foreach($dokter as $p)
                                        <?php $no++ ;?>
                                          <tr>
                                                <td>{{ $no}}</td>
                                                <td>{{ $p->nama }}</td>
                                                <td> {{$p->umur}}</td>
                                                <td>{{$p->gender}}</td>
                                                <td>{{ $p->alamat }}</td>
                                                <td>{{$p->id}}</td>
                                                <td>
                                                <a href="/dokter/edit/{{ $p->id }}" class="btn btn-warning">Edit</a>
                                                <a href="/dokter/delete/{{ $p->id }}" class="btn btn-danger" onclick="return confirm('yakin ingin dihapus')">Hapus</a>
                                                
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

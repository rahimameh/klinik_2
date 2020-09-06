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
  
                            <div class="panel body"> 
                                <h1>Data Pasien</h1></br>
                                   @if(auth()->user()->role == 'admin')    
                                <a href="/pasien/tambah" class="btn btn-success"><i class="fa fa-user-plus"></i> Pasien Baru</a>
                                <a href="/pasien/cetak_pdf" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a>
                                @endif                              
                            </div>                 
                                <div class="col-md-4">
                                <form action="/pasien/cari" method="GET">
                            <input type="text" style="position:right;" name="cari" placeholder="Cari pasien .." value="{{ old('cari') }}">
                            <button type="submit" value="CARI" ><i class="fa fa-search"></i></button>
                                </div><br>
    
									<table class="table table-hover ">
										<thead>
											<tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Umur</th>
                                                <th>Gender</th>
                                                <th>Alamat</th>
                                                <th>ID Pasien</th>
                                                <th>OPSI</th>
											</tr>
										</thead>
										<tbody>
                                        <?php $no = 0;?>
											 <!-- pengulangan,masukkan ke table pasien -->
                                             @foreach($pasien as $p)
                                             <?php $no++ ;?>
                                            <tr>
                                                <td>{{ $no}}</td>
                                                <td>{{ $p->nama }}</td>
                                                <td>{{$p->umur}}</td>
                                                <td>{{$p->gender}}</td>
                                                <td>{{ $p->alamat }}</td>       
                                                <td>{{ $p->id}}</td>
                                                <td>                                                
                                <a href="/rm/{{$p->id}}" class="btn btn-primary"><i class="fa fa-medkit"></i>Rekam Medis</a> 
                                @if(auth()->user()->role == 'admin')                            
                                <a href="/pasien/edit/{{ $p->id }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                <a href="/pasien/delete/{{ $p->id }}" class="btn btn-danger" onclick="return confirm('yakin ingin dihapus')"><i class="fa fa-trash-o"></i></a>
                                @endif
                                            </tr>
                                            @endforeach
										</tbody>
                                    </table>
                                    {{ $pasien->links() }}
                                    Halaman : {{ $pasien->currentPage() }} <br/>
                                    Jumlah Data : {{ $pasien->total() }} <br/>
                                    Data Per Halaman : {{ $pasien->perPage() }} <br/>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @stop

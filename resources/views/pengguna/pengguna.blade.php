@extends('layout.master')

    @section('content')
        <div class="main">
            <div class="main-content">
                <div class="conteiner-fluid">
                    <div class="row">
                        <div class="col-nd-12">
                            <div class="panel">
								<div class="panel-heading">
                                    <h1>Data User</h1></br>
                                    
								</div>
							<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
                                                <th>No</th>
                                            <!-- ambil id dri pasien n dokter,taro di id user -->
                                                <th>ID User</th>
                                                <!-- apa Pasien,Dokter atau admin? -->
                                                <th>Nama</th>
                                                <th>Keterangan</th>
                                                <th>Email</th>
                                                <th>Opsi</th>
											</tr>
										</thead>
										<tbody>
                                        <?php $no = 0;?>
											 <!-- pengulangan,masukkan ke table pengguna -->
                                             @foreach($users as $p)
                                             <?php $no++ ;?>
                                            <tr>
                                                <td>{{ $no}}</td>
                                                <td>{{ $p->id }}</td>
                                                <td>{{ $p->name}}</td>                                           
                                                <td> {{$p->role}}</td>
                                               <td>{{$p->email}}</td>
                                               <td><a href="/user/delete/{{ $p->id }}" class="btn btn-danger" onclick="return confirm('yakin ingin dihapus')"><i class="fa fa-trash-o"></i>Hapus</a>
                                               </td>
                                            </tr>
                                            @endforeach
										</tbody>
									</table>
                                    {{ $users->links() }}
                                    Halaman : {{ $users->currentPage() }} <br/>
	Jumlah Data : {{ $users->total() }} <br/>
	Data Per Halaman : {{ $users->perPage() }} <br/>
								</div>
							</div>
            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @stop

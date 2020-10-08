@extends('layout.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="conteiner-fluid">
            <div class="row">
                    <div class="panel">
                        <div class="panel-heading">
                            <h1>Riwayat Kunjungan Pasien</h1>
                        <div class="panel-body">
                            <div class="car-body">
                            <div class="col-md-3">
                                <div class="input-group-mb-3">
                                   <label for="label">Dari</label>
                                   <input type="date" name="dari" id="dari" class="form-control">
                                </div>
                                </div>

                            </div>
                            <div class="car-body">
                            <div class="col-md-3">
                                <div class="input-group-mb-3">
                                   <label for="label">Sampai</label>
                                   <input type="date"  name="sampai" id="sampai" class="form-control">
                                </div>
                            </div>
                            </div><br>
                            <div class="col-md-3">

                            <div class="input-group-mb-3">
                            <a href="" onclick="this.href='/cetak_laporan/'+ document.getElementById('dari').value+
                            '/'+ document.getElementById('sampai').value " target="_blank" class="btn btn-primary"> Cetak <i class="fa fa-print"></i></a>
                            </div>
                        </div>
                        </div>
                        
                        <table class=" table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nomor Antrian</th>
                                            <th>ID_User</th>
                                            <th>Nama Pasien</th>
                                           
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0;?>
                                     <!-- pengulangan,masukkan ke table pasien -->
                                     <!-- masukin data ke db antrian sesuai usernya -->
                                        @foreach($riwayat as $a)
                                        <?php $no++ ;?>
                                          <tr>
                                                <td>{{ $no}}</td>
                                                <td>{{ $a->created_at->format('d-M-Y H:i')}}</td>
                                               
                                                <td>{{$a->antrian}}</td>
                                                <td> {{$a->user_id}}</td>
                                                <td> {{$a->user->name}}</td>
                                                
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                                {{ $riwayat->links() }}
                                    Halaman : {{ $riwayat->currentPage() }} <br/>
                                    Jumlah Data : {{ $riwayat->total() }} <br/>
                                    Data Per Halaman : {{ $riwayat->perPage() }} <br/>
                        </div>
                        
                    </div>
            
            </div>
        </div>
    </div>
</div>
@stop

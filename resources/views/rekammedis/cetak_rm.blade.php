@extends('layout.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="conteiner-fluid">
            <div class="row">
                <div class="col-nd-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h1> Riwayat Rekam Medis</h1>
                            @extends('layout.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="conteiner-fluid">
            <div class="row">
                
                    <div class="panel">
                        <div class="panel-heading">
                            <h1>Laporan Kunjungan Pasien</h1>
                               
                            
                        <div class="panel-body">
                            <div class="car-body">
                                <div class="input-group-mb-3">
                                   <label for="label">Dari</label>
                                   <input type="date" name="dari" id="dari" class="form-control">
                                </div>
                            </div>
                            <div class="car-body">
                                <div class="input-group-mb-3">
                                   <label for="label">Sampai</label>
                                   <input type="date" name="sampai" id="sampai" class="form-control">
                                </div>
                            </div>

                            <div class="input-group-mb-3">
                            <a href="" onclick="this.href='/cetak_rm/'+ document.getElementById('dari').value+
                            '/'+ document.getElementById('sampai').value " target="_blank" class="btn btn-primary"> Cetak <i class="fa fa-print"></i></a>
                            </div>
                        </div>
                        </div>
                    </div>
            
            </div>
        </div>
    </div>
</div>
@stop

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th >No</th>
                                            <th>Id Rekam Medis</th>
                                            <th>ID_Dokter</th>
                                            <th>Keluhan</th>
                                            <th>Diagnosis</th>
                                            <th>Theraphy</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0;?>
                                     <!-- masuk ke id nya,yg relasi'in rm()-->
                                        @foreach($rm as $r)
                                        <?php $no++ ;?>
                                          <tr>
                                                <td>{{ $no}}</td>
                                                <td>{{$r->id}}</td>
                                                <td>{{$r->user_id}}</td>                                     
                                                <td>{{$r->keluhan}}</td>
                                                <td>{{$r->diagnosis}}</td>
                                                <td>{{$r->theraphy}}</td>
                                                <td>{{$r->created_at->format('d, M Y')}}</td>
                                                @endforeach
                                            </tr>
                                    </tbody>
                                </table>
                                {{ $rm->links() }}
                                    Halaman : {{ $rm->currentPage() }} <br/>
                                    Jumlah Data : {{ $rm->total() }} <br/>
                                    Data Per Halaman : {{ $rm->perPage() }} <br/>
                            </div>
                        </div>
                    </div>
            
            </div>
        </div>
    </div>
</div>
@stop

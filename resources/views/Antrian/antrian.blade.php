@extends('layout.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="conteiner-fluid">
            <div class="row">
                <div class="col-nd-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h1>Daftar Antrian</h1>

                                                 
                            <a href="/antrian/tambah/{{$user->id}}" class="btn btn-primary"><i class="fa fa-plus"></i>Input data </a>
                                    <div class="panel-body">   
                            <h3><label>Halo </label><i class="text-success">{{$user->name}}</i></h3>

                            <h3><label>Antrian saat ini = Nomor </label><i class="text-success" nama="antrian" id="antrian">{{$antrian}}</i></h3>
                                <table class=" table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            
                                            <th>Nomor Antrian</th>
                                            <th>ID_Pasien</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0;?>
                                     <!-- pengulangan,masukkan ke table pasien -->
                                        @foreach($user->antri as $a)
                                        <?php $no++ ;?>
                                          <tr>
                                                <td>{{ $no}}</td>
                                               
                                                <td>{{$a->nomor_antrian}}</td>
                                                <td> {{$a->user_id}}</td>
                                                <td>{{ $a->created_at}}</td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

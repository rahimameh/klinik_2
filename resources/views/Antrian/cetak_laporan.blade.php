<html>
<head>
         <h2>Laporan Kunjungan Pasien</h2></br></br></br>
         <i>by: {{$user}}</i>
         
 </head>
 <body>
   <table align= center>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                        <th>Id_Antri</th>
                                            <th>Nomor Antrian</th>
                                            <th>Nama Pasien</th>
                                            <th>Tanggal</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0;?>
                                     <!-- pengulangan,masukkan ke table pasien -->
                                     <!-- masukin data ke db antrian sesuai usernya -->
                                        @foreach($cetak as $a)
                                        <?php $no++ ;?>
                                          <tr>
                                                <td>{{ $no}}</td>
                                                <td>{{$a->id}}</td>
                                                <td>{{$a->antrian}}</td>
                                              
                                                <td> {{$a->pasien->nama}}</td>
                                                <td>{{ $a->created_at->format('d-m-Y, H:i')}}</td>
                                               
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                                <style type="text/css">
	h2{
        text-align: center;
  font-family: sans-serif;
}
 
table {
    position:center;
  font-family: sans-serif;
 border: #000000 1px solid;
}
 
table th {

  padding: 5px 20px;
  border-left:1px solid #0e0e0e;
  border-bottom: 1px solid #0e0e0e;
  background: #e3e3e3;
}
 
table tr {
  text-align: center;
  padding-left: 2px;
}
 
table td {
  padding: 5px 20px;
  border-top: 1px solid #ffffff;
  border-bottom: 1px solid #111;
  border-left: 1px solid #111;
  background: #fff;
}
	</style>

 </body>                       				
 </html>
                           
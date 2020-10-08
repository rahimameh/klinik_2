<html>
<head>
<h1>Laporan Kunjungan Pasien</h1></br></br></br>
</head>

<body>
<table>
<thead>
                                        <tr>
                                            <th style="width:1%; text-align:center;">No</th>
                                            <th style="width:7%; text-align:center;">Dokter</th>
                                            <th style="width:4%; text-align:center;">Id_Rm</th>
                                            <th style="width:19%; text-align:center;">Keluhan</th>
                                            <th style="width:20%; text-align:center;" >Diagnosis</th>
                                            <th style="width:20%;text-align:center;">Theraphy</th>
                                            <th style="width:10%; text-align:center;" >Tanggal</th>
                                           
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
                                              
                                                @endforeach
            </tr>
        </tbody>
</table>
<style type="text/css">
	h1{
        text-align: center;
  font-family: sans-serif;
}
h5{
    text-align: left;
  font-family: sans-serif;
}
 
table {
  width:100%;
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
<html>
<head>
<h1>Rekam medis Pasien</h1></br></br></br>
</head>
<h5>{{$user}}</h5>
<body>
<table>
       <thead>
            <tr>
                <th>No</th>
                <th>Id Rekam Medis</th>                                        
                <th>Keluhan</th>
                <th>Diagnosis</th>
                <th>Theraphy</th>
                <th>Tanggal</th>
                <th>Dokter</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0;?>
                @foreach($pasien->rm as $r)
            <?php $no++ ;?>
            <tr>
                <td>{{ $no}}</td>
                <td>{{$r->id_rm}}</td>                                                                           
                <td>{{$r->keluhan}}</td>
                <td>{{$r->diagnosis}}</td>
                <td>{{$r->theraphy}}</td>
                <td>{{$r->created_at->format('d, M Y')}}</td>
               @endforeach
                <td>{{$user}}</td>
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
    position:center;
  font-family: sans-serif;
 border: #000000 1px solid;
}
 
table th {

  padding: 15px 35px;
  border-left:1px solid #0e0e0e;
  border-bottom: 1px solid #0e0e0e;
  background: #e3e3e3;
}
 
table tr {
  text-align: center;
  padding-left: 2px;
}
 
table td {
  padding: 8px 35px;
  border-top: 1px solid #ffffff;
  border-bottom: 1px solid #111;
  border-left: 1px solid #111;
  background: #fff;
}
	</style>
</body>
</html>
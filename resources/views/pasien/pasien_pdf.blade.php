<html>
<head>
         <h1>Data Pasien</h1></br></br></br>
         
 </head>
 <body>

<table>
										<thead>
											<tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Umur</th>
                                                <th>Gender</th>
                                                <th>Alamat</th>
                                                <th>ID Pasien</th>
                                                
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
                                            </tr>
                                            @endforeach
                                           
										</tbody>
                                    </table>
<style type="text/css">
	h1{
        text-align: center;
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
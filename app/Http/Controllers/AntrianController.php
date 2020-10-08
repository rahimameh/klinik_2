<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Antrian;
use App\Pasien;
use App\Dokter;
use Auth;
use Carbon\carbon;
use PDF;

class AntrianController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

   
    public function index()
    {
        $nomor="Nomor";
        $cek=Antrian::whereDate('created_at', '=', Carbon::today())->get();
        // $pasien= Antrian::whereDate('created_at', '=', Carbon::today())->get('pasien_id');
        // // $pasien = Pasien::where('id','like',"".$h."");
    
          if(count($cek)===0){
              $no_antrian="Belum ada antrian";
              foreach($cek as $c){
                  $hitung= $cek->count();
                  $no_antrian=$nomor." ".$hitung;
              }/////kalau user yg input di hari ini 0 atau ga ada,maka antriannya 1,selain itu,antrian++
          }else{
                  foreach($cek as $c){
                    $hitung= $cek->count();
                    $no_antrian=$nomor." ".$hitung;
                  }
              }       
              
              $user= Auth::user();
              if($user->role!='admin'){
                  if($user->role=='pasien'):
                        $pasien = Pasien::where('user_id',$user->id)->first()->id;
                  elseif($user->role=='dokter'):
                        $pasien = Dokter::where('user_id',$user->id)->first()->id;
                  endif;
              } else {
                  $pasien = '';
              }
              
             return view ('Antrian.antrian',compact('user','no_antrian','cek','pasien'));      
      
    }

    public function tambah( Request $request,$id)
    { 
        $itung=Antrian::whereDate('created_at', '=', Carbon::today())->count();
        $user= Auth::user()->id;
        $pasien = Pasien::where('user_id','like',"".$user."")->first()->id;
       
        
               $antrian=$itung+1;    
         return view ('Antrian.tambah',compact('antrian','pasien'));
    }
 
    public function store (Request $request) 
    {    
        $user = Auth::user()->id;
        $antrian= $request->antrian;
        $id= $request->id;
        
        $antrian = Antrian::create([
                'antrian' =>  $antrian,
                'user_id' => $user,
                'pasien_id'=> $id
                
            ]);
            return redirect('/antrian')->with(['success' => 'Data berhasil ditambahkan']);
    }

    public function delete($id)
    {   
        $antrian=Antrian::findorFail($id);
      
        $antrian->delete();


        return redirect('/antrian')->with(['error' => 'Data berhasil dihapus']);
    
    }



        public function laporan(){
            $riwayat= Antrian::orderBy('created_at')->paginate(5);

            return view('antrian.laporan_kunjungan',compact('riwayat'));
        }
        public function cetak($dari,$sampai){
            $user= Auth::user()->name;
           $cetak= Antrian::whereBetween('created_at',[$dari,$sampai])->get();
           $pdf = PDF::loadview('antrian.cetak_laporan',compact('cetak','user'));
           	return $pdf->stream();


        }
    
}

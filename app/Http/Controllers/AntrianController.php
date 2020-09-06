<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Antrian;
use App\User;
use App\Pasien;
use Auth;
use Carbon\carbon;

class AntrianController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index()
    {
          $time= Carbon::now()->locale('id')->translatedFormat('Y-m-d');
          $cek=User::where('created_at','=',$time)->get();
          if(count($cek)==0){
              $antrian=1;
              foreach($cek as $c){
                  $antrian= $cek->count()+1;
              }/////kalau user yg input di hari ini 0 atau ga ada,maka antriannya 1,selain itu,antrian++
          }else{
                  foreach($cek as $c){
                  $antrian= $cek->count()+1;
                  }
              }
              $user= Auth::user();
             return view ('Antrian.antrian',compact('user','antrian'));      
    }

    public function tambah( Request $request,$id)
    { 
        $time= Carbon::now()->locale('id')->translatedFormat('d-m-Y');
        $cek=User::where('created_at','=',$time)->get();
        $an= $request->antrian;
        if($cek->count()==0){
            $antrian=1;
            foreach($cek as $c){
                $antrian= $an->count()+1;
            }
        }else{
                foreach($cek as $c){
                $antrian= $cek->count()+1;
                }
            }


        $user=  User::findOrFail($id);
        $antri = $user->antri();
        return view ('Antrian.tambah',compact('user','antri','antrian'));
    }
 
    public function store (Request $request) 
    {    
        // $time= Carbon::now()->locale('id')->translatedFormat('Y-m-d');
        // $cek=User::where('created_at','=',$time)->get();
        $user = Auth::user()->id;
        // $i = Antrian::where('id_antri',$request->get('antrian'))->first();
        // $user_id= $user->id;
        // // $a= $user->antri();
        // $user= $request->get('id');
        $antrian= $request->antrian;
        $time= Carbon::now()->locale('id')->translatedFormat('d-m-Y');
        // $cek=Antrian::where('created_at','=',$time)->get();
        // if($cek->count()==0){
        //     $antrian=1;
        //     foreach($user->antri as $a){
        //         $a= $cek->count()+1;
        //     }
        // }else{
        //         foreach($cek as $c){
        //         $antrian= $cek->count()+1;
        //         }
        //     }
       
       $tung= $antrian+1;
    //    return $user;
        $antri = Antrian::create([
                'nomor_antrian' =>  $tung,
                'user_id' => $user
            ]);
            
            return view ('Antrian.antrian',compact('user','antrian'));      
            //   return dd($antri);
    }

    public function delete($id)
    {    $antrian = Antrian::find($id);
        $antrian->delete();
        return redirect('/antrian');
    }

}

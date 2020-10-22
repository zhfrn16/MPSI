<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Detail_dosbing;
use App\model\dosen;
use App\model\mahasiswa;
use App\model\Rancangan;
use App\model\Konsentrasi;

class DosenController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:dosen');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $data=Detail_dosbing::where('id_dosen', '=', $user_id)
                        ->get();
        return view('dosen.dosen', compact('data'));
    }
    public function terima($id){
        $user_id = auth()->user()->id;
        $data=Detail_dosbing::where('id_dosen', '=', $user_id)
                        ->get();
        $updates = Rancangan::where('id', $id)->first();
        Rancangan::where('id', $id)
          ->update(['status' => 1]);
        
        return redirect()->route('Dosen.home', compact('data'));
    
    }
    public function tolak($id){
        $data = Rancangan::where('id',$id)->first();


        return view('dosen.tolak', compact('data','id'));
        
    }
    public function tolaks(Request $request, $id){

        $updates = Rancangan::where('id', $id)->first();
        Rancangan::where('id', $id)
          ->update(['status' => 2],
          ['catatan_dosen' => $request->catatan]);
         
        Rancangan::where('id', $id)->update($request->only(
            'catatan_dosen'
          
        ));
        
        return redirect()->route('Dosen.home', compact('data'));
       
    }
}
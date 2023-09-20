<?php

namespace App\Http\Controllers;

use App\Models\mobil;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class lamanController extends Controller
{
    //
    function admin(){
        $no=1;
        $dataUser=User::where('role','user')->count();
        $dataMobil=mobil::count();
        $dataTransaksi=transaksi::count();
        $data=transaksi::where('status','menunggu konfirmasi')->get();
        $mobil=mobil::all();
        $user=User::all();
        return view('admin/index')->with(['no' => $no, 'dataUser' => $dataUser,'dataMobil' => $dataMobil,'dataTransaksi' => $dataTransaksi,'data' => $data,'mobil'=>$mobil,'user' => $user]);
    }
    function user(){
        $no=1;
        $mobil=mobil::orderBy('biayaMingguan', 'desc')->get();
        return view('dashboard')->with(['mobil'=>$mobil,'no' => $no]);
    }
    function detail($id){
        $data=mobil::where('id',$id)->first();
        return view('detailMobil')->with('data',$data);
    }
    function order(Request $request){
        $userID=Auth::user()->id;
        $data=[
            'userId'=>$userID,
            'paket'=>$request->input('paket'),
            'mobilID'=>$request->input('mobilID'),
            'tanggalDiambil'=>$request->input('tanggalDiambil'),
            'tanggalDikembalikan'=>$request->input('tanggalDikembalikan'),
            'biaya'=>$request->input('biaya'),
        ];
        transaksi::create($data);
        return redirect('/transaksi')->with('success','Berhasil memesan, tunggu konfirmasi dari Admin');
    }
    function transaksi(){
        $data=transaksi::where('userId',Auth::user()->id)->orderBy('id', 'desc')->get();
        $mobil=mobil::all();
        return view('transaksi')->with(['data'=>$data, 'mobil'=>$mobil]);
    }
    function userTransaksi(){
        $idUser=Auth::user()->id;
        $no=1;
        $data=transaksi::where('userId',$idUser)->get();
        return view('transaksi')->with(['data'=>$data,'no' => $no]);
    }
}

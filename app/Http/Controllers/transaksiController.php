<?php

namespace App\Http\Controllers;

use App\Models\mobil;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class transaksiController extends Controller
{
    //
    function index(){
        $no=1;
        $data=transaksi::all();
        $mobil=mobil::all();
        $user=User::all();
        return view('admin/halaman/infoSewa')->with(['data'=>$data, 'no'=>$no, 'mobil'=>$mobil, 'user'=>$user]);
    }
    function detail($id){
        $data=transaksi::where('id',$id)->first();
        $mobil=mobil::all();
        $user=User::all();
        return view('admin/halaman/detailSewa')->with(['data'=>$data,  'mobil'=>$mobil, 'user'=>$user]);
    }
    
    function confirm($id){
        // mengambil data dari table transaksi berdasarkan id
        $tr=transaksi::where('id',$id)->first();
        // mengambil ID mobil pada id transaksi tersebut
        $idMobil=$tr->mobilID;
        $update=['status'=>'dibatalkan'];
        // mengambil data berdasarkan id mobil yang sama dan mengubah nya menjadi dibatalkan
        transaksi::where('mobilID',$idMobil)->update($update);
        //update data kolom status berdasarkan id yang ingin di konfirmasi
        $tr->status = 'dikonfirmasi';
        $tr->save();
        
        $mobil=mobil::where('id',$idMobil)->first();
        $mobil->status= 'Tidak Tersedia';
        $mobil->save();





        return redirect('admin/transaksi/detail/'.$id);
    }
    function cencel($id){
        $tr=transaksi::where('id',$id)->first();
        $tr->status = 'dibatalkan';
        $tr->save();
        $idMobil=$tr->mobilID;
        $mobil=mobil::where('id',$idMobil)->first();
        $mobil->status= 'Tersedia';
        $mobil->save();
        return redirect('admin/transaksi/detail/'.$id);
    }
}

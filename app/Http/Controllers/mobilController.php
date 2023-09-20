<?php

namespace App\Http\Controllers;

use App\Models\mobil;
use Illuminate\Http\Request;

class mobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $no=1;
        $data=mobil::all();
        return view('admin/halaman/mobil')->with(['data'=>$data,'no'=>$no]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $gambar=$request->file('gambarMobil');
        $newFileName = 'img' . date('ymdhis') . '.' . $gambar->getClientOriginalExtension();
        $gambar->move(public_path('carsImg'), $newFileName);
        $data=[
            'namaMobil'=>$request->input('namaMobil'),
            'tipeMobil'=>$request->input('tipeMobil'),
            'deskripsi'=>$request->input('deskripsi'),
            'biayaHarian'=>$request->input('biayaHarian'),
            'biayaMingguan'=>$request->input('biayaMingguan'),
            'gambarMobil'=>$newFileName
        ];
        mobil::create($data);
        return redirect('admin/mobil')->with('success','Berhasih menambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data=mobil::where('id',$id)->first();
        return view('admin/halaman/detailMobil')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $no=1;
        $edit='edit';
        $data=mobil::all();
        $dataEdit=mobil::where('id',$id)->first();

        return view('admin/halaman/mobil')->with(['data'=>$data,'no'=>$no,'edit'=>$edit,'dataEdit'=>$dataEdit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $dataLama=mobil::where('id',$id)->first();
        $gambarLama=$dataLama->gambarMobil;
        if($request->hasFile('gambarMobil')){
            unlink(public_path( '/carsImg/'.$gambarLama));
            $gambar=$request->file('gambarMobil');
            $newFileName = 'img' . date('ymdhis') . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('carsImg'), $newFileName);
            $data=[
                'namaMobil'=>$request->input('namaMobil'),
                'tipeMobil'=>$request->input('tipeMobil'),
                'deskripsi'=>$request->input('deskripsi'),
                'biayaHarian'=>$request->input('biayaHarian'),
                'biayaMingguan'=>$request->input('biayaMingguan'),
                'gambarMobil'=>$newFileName
            ];
            mobil::where('id',$id)->update($data);
            return redirect('admin/mobil');
        }
        $data=[
            'namaMobil'=>$request->input('namaMobil'),
            'tipeMobil'=>$request->input('tipeMobil'),
            'deskripsi'=>$request->input('deskripsi'),
            'biayaHarian'=>$request->input('biayaHarian'),
            'biayaMingguan'=>$request->input('biayaMingguan'),
            'gambarMobil'=>$gambarLama
        ];
        mobil::where('id',$id)->update($data);
        return redirect('admin/mobil')->with('success','Berhasih update data');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $dataLama=mobil::where('id',$id)->first();
        $gambarLama=$dataLama->gambarMobil;
        unlink(public_path( '/carsImg/'.$gambarLama));
        $dataLama->delete();
        return redirect('admin/mobil')->with('success','Berhasih menghapus');
    }
}

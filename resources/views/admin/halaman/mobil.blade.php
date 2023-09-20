@extends('admin/layout/admin')

@section('isi')
    

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Transaksi</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-warning " style="margin: 10px">
                <div class="card-header">
                  <h3 class="card-title">Menyimpan data</h3>
                </div>
                <div class="card-body " >
    
    <form @if (isset($edit))
        action="{{url('admin/mobil/'.$dataEdit->id)}}"
    @else
        action="{{url('admin/mobil')}}"
    @endif
    method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($edit))
            @method('put')
        @endif
        <div class="card-body">
            <div class="form-group">
                <label for="namaMobil">Nama Mobil:</label>
            
                <input type="text" class="form-control" id="namaMobil" name="namaMobil" 
                @if (isset($edit))
                    value="{{$dataEdit->namaMobil}}"
                @endif 
                required>
            </div>
            <div class="form-group">
                <label for="tipeMobil">Tipe Mobil</label>
                <input type="text" class="form-control" id="tipeMobil" name="tipeMobil"
                @if (isset($edit))
                    value="{{$dataEdit->tipeMobil}}"
                @endif 
                required>
            </div>
            
            <div class="form-group">
                
                @if (isset($edit))
                    <img src="{{url('carsImg/'.$dataEdit->gambarMobil)}}" alt="" width="250px"><br>
                    <img id="previewGambarMobil" src="#" alt="" width="250px">
                    <label for="gambarMobil">Gambar</label>
                    <input type="file" class="form-control" id="gambarMobil" name="gambarMobil" accept="image/*">
                @else
                    <img id="previewGambarMobil" src="#" alt="" width="250px">
                    <label for="gambarMobil">Gambar</label>
                    <input type="file" class="form-control" id="gambarMobil" name="gambarMobil" accept="image/*"required>
                @endif
            
                
            
            </div>
            <div class="form-group">
                <label >deskripsi</label>
                <textarea name="deskripsi" class="form-control" cols="30" rows="10">@if (isset($edit)){{$dataEdit->deskripsi}}@endif</textarea>
                
            </div>
            <div class="form-group">
                <label for="biayaHarian">Harga Sewa Harian</label>
           
                <input type="text" class="form-control" id="biayaHarian" name="biayaHarian" @if (isset($edit))
                value="{{$dataEdit->biayaHarian}}"
            @endif 
            required>
            </div>
            <div class="form-group">
                <label for="biayaMingguan">Harga Sewa Mingguan</label>
            
                <input type="text" class="form-control" id="biayaMingguan" name="biayaMingguan" @if (isset($edit))
                value="{{$dataEdit->biayaMingguan}}"
            @endif 
            required>
            </div>
            
            <input type="submit" value="Submit" class="btn btn-success">
                @if (isset($edit))
                    <a href="{{url('admin/mobil')}}" class="btn btn-warning">Batal</a>
                    
                @else
                    <button type="reset" class="btn btn-warning" >Reset</button>
                @endif    
        </div> 
    </form>
</div>
</div>
</div>
    </section>
<section class="content">
    <div class="container-fluid">
<div class="row">
    <div class="card" style="width: 100%;">
      <div class="card-header">
        <h2 id="barang">Daftar Mobil</h2>
    
      </div>
      <div class="card-body">
    <table class="table table-bordered table-hover" >
        <thead>
            <tr>
                <th class="hide">#</th>
                <th>Mobil</th>
                <th class="hide">Tipe</th>
                <th class="hide">Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td class="hide">{{$no++}}</td>
                    <td>{{$item->namaMobil}}</td>
                    <td class="hide">{{$item->tipeMobil}}</td>
                    <td class="hide">{{$item->status}}</td>
                    </td>
                    <td style="display: flex; gap:5px">
                        <div>

                            <a href="{{url('admin/mobil/'.$item->id)}}" class="btn btn-primary btn-xs">Show</a>
                            <a href="{{url('admin/mobil/'.$item->id.'/edit')}}" class="btn btn-success btn-xs">Edit</a> 
                        </div>
                        <form  action="{{url('admin/mobil/'.$item->id)}}" method="post" onsubmit="return confirm('Apakah anda yakin akan menghapus data')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-xs" type="submit">Delete</button>
                        </form>
                    </td> 
                </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
</div>
</div>
    </section>
@endsection
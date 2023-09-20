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

    
    <div class="row">
        <div class="card" style="width: 100%;">
          <div class="card-header">
            <h2 id="barang">Daftar Transaksi</h2>
        
          </div>
          <div class="card-body">
        <table class="table table-container table-bordered table-hover" >
        <thead>
            <tr>
                <th>#</th>
                <th>ID Pelanggan</th>
                <th class="hide"> ID kendaraan</th>
                <th class="hide">Paket</th>
                <th class="hide">Total</th>
                <th>status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>
                        @foreach ($user as $pengguna)
                            @if ($pengguna->id == $item->userId)
                            {{$pengguna->name}}
                            @endif
                        @endforeach
                    </td>
                    <td class="hide">
                        @foreach ($mobil as $car)
                            @if ($car->id == $item->mobilID)
                            {{$car->namaMobil}}
                            @endif
                        @endforeach
                    </td>
                    <td class="hide">{{$item->paket}}</td>
                    <td class="hide">{{$item->biaya}}</td>
                    <td>{{$item->status}}</td>
                    <td>
                        <a href="{{url('admin/transaksi/detail/'.$item->id)}}" class="btn btn-info btn-xs">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
</div><!-- /.container-fluid -->
</section>
@endsection
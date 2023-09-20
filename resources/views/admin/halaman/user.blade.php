@extends('admin/layout/admin')

@section('isi')
    

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manajemen User</h1>
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
            <h2 id="barang">Table User</h2>
        
          </div>
          <div class="card-body">
        <table class="table table-bordered table-hover" >
        <thead>
            <tr>
                <td>#</td>
                <td>Nama</td>
                <td class="hide">Email</td>
                <td class="hide">No HP</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->name}}</td>
                    <td class="hide">{{$item->email}}</td>
                    <td class="hide">{{$item->phone_number}}</td>
                    <td><a href="{{url('admin/user/delete/'.$item->id)}}" class="btn btn-warning btn-xs">Hapus</a></td>
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
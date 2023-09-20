@extends('admin/layout/admin')

@section('isi')
    

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$dataTransaksi}} data
                </h3>

                <p>Transaksi</p>
              </div>
              <div class="icon">
                <i class="ion ion-document-text"></i>
              </div>
              <a href="{{url('/admin/transaksi')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$dataMobil}} data
                </h3>

                <p>Mobil</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-list"></i>
              </div>
              <a href="{{url('/admin/mobil')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$dataUser}} Data
                </h3>
                <p>User</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{url('/admin/user')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="card" style="width: 100%">
            <div class="card-header">
              <h2 id="barang">Transaksi belum di konfirmasi</h2>
          
            </div>
            <div class="card-body">
          <table class="table table-bordered table-hover" style="width: 100%">
            <thead>
                <tr>
                    <td class="hide">#</td>
                    <td>Pelanggan</td>
                    <td>kendaraan</td>
                    <td class="hide">Paket</td>
                    <td class="hide">Total</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td class="hide">{{$no++}}</td>
                        <td>
                            @foreach ($user as $pengguna)
                                @if ($pengguna->id == $item->userId)
                                {{$pengguna->name}}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($mobil as $car)
                                @if ($car->id == $item->mobilID)
                                {{$car->namaMobil}}
                                @endif
                            @endforeach
                        </td>
                        <td class="hide">{{$item->paket}}</td>
                        <td class="hide">{{$item->biaya}}</td>
                        <td>
                            <a href="{{url('admin/transaksi/detail/'.$item->id)}}" class="btn btn-success btn-xs">Lihat</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
        </div>
        <!-- Main row -->
        <div class="row">

          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            




          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">





            
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


@endsection
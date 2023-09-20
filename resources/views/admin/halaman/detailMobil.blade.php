@extends('admin/layout/admin')

@section('isi')
    

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Detail Mobil</h3>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">

        
        <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
        <div class="row">
        <div class="col-12 col-sm-6">
            <h3 class="d-inline-block d-sm-none"></h3>
            <div class="col-12">
            <img src="{{url('/carsImg/'.$data->gambarMobil)}}" class="product-image" alt="Product Image">
            </div>
            <div class="col-12 product-image-thumbs">
                <a href="{{url('/admin/mobil')}}" class="btn btn-warning">Kembali</a>
            </div>

        </div>
        <div class="col-12 col-sm-6">
            <h3 class="my-3">{{$data->namaMobil}}</h3>
            <p>Tipe Mobil: {{$data->tipeMobil}}</p>
            <p>Deskripsi: {{$data->deskripsi}}</p>
            <p>Status: <b>{{$data->status}}</b></p>


            <hr>

            <div class="bg-gray py-2 px-3 mt-4">
            <h2 class="mb-0">
                Rp. {{$data->biayaHarian}}
            </h2>
            <h4 class="mt-0">
                <small>/Harian</small>
            </h4>
            </div>
            <div class="bg-gray py-2 px-3 mt-4">
            <h2 class="mb-0">
                Rp. {{$data->biayaMingguan}}
            </h2>
            <h4 class="mt-0">
                <small>/Mingguan</small>
            </h4>
            </div>
            

        </div>
        </div>
        
        
        </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>
    <!-- /.card -->
    </section>
    @endsection
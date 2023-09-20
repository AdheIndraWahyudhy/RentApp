@extends('admin/layout/admin')

@section('isi')
    

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Transaksi</h1>
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
                @foreach ($mobil as $car)
                    @if ($car->id == $data->mobilID)
                        <img src="{{url('/carsImg/'.$car->gambarMobil)}}" class="product-image" alt="Product Image">
                    @endif
                @endforeach
            </div>
            
            <div class="col-12 ">
                
            </div>
            <div class="col-12 product-image-thumbs">
                <a href="{{url('/admin/transaksi')}}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <h3 class="my-3">
                @foreach ($mobil as $car)
                    @if ($car->id == $data->mobilID)
                        {{$car->namaMobil}}
                    @endif
                @endforeach    
            </h3>
            <p>
                Pemesan:
                @foreach ($user as $pengguna)
            @if ($pengguna->id == $data->userId)
                {{$pengguna->name}}
            @endif
         @endforeach
            </p>
            <p>Paket: {{$data->paket}}</p>
            <p>Status: <b>{{$data->status}}</b></p>
            <hr>
            <h3>Aksi</h3>
                @if ($data->status == "menunggu konfirmasi")
                    <button class="button-style btn btn-success btn-sm" onclick="redirectToURL('{{url('/admin/transaksi/detail/'.$data->id.'/konfirmasi')}}')" >Konfirmasi</button>
                    <button class="button-style btn btn-danger btn-sm" onclick="redirectToURL('{{url('/admin/transaksi/detail/'.$data->id.'/batal')}}')" >Batalkan</button>
                @elseif ($data->status == "dikonfirmasi")
                    <button class="button-style btn btn-success btn-sm" onclick="redirectToURL('{{url('/admin/transaksi/detail/'.$data->id.'/konfirmasi')}}')" disabled>Konfirmasi</button>
                    <button class="button-style btn btn-danger btn-sm" onclick="redirectToURL('{{url('/admin/transaksi/detail/'.$data->id.'/batal')}}')" >Batalkan</button>
                @else
                    <button class="button-style btn btn-success btn-sm" onclick="redirectToURL('{{url('/admin/transaksi/detail/'.$data->id.'/konfirmasi')}}')" >Konfirmasi</button>
                    <button class="button-style btn btn-danger btn-sm" onclick="redirectToURL('{{url('/admin/transaksi/detail/'.$data->id.'/batal')}}')" disabled>Batalkan</button>
                @endif
            <hr>
            <div class="bg-gray py-2 px-3 mt-4">
                <h4 class="mt-0">
                    <small>Tanggal Diambil: </small>
                </h4>
                <h2 class="mb-0">
                    {{$data->tanggalDiambil}}
                </h2>
            </div>
            <div class="bg-gray py-2 px-3 mt-4">
                <h4 class="mt-0">
                    <small>Tanggal Dikembalikan: </small>
                </h4>
                <h2 class="mb-0">
                    {{$data->tanggalDikembalikan}}
                </h2>
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
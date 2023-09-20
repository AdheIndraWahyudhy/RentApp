@extends('layout.user')

@section('title')
    Transaksi
@endsection

@section('konten')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

        
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-bullhorn"></i>
                    Info Transaksi
                  </h3>
            </div>
            <div class="card-body">
                <div class="row ">

                    @foreach ($data as $item)
                    <div class="callout callout-info " style="margin:10px; width: 365px">
                        <h3>Mobil: @foreach ($mobil as $mb)
                            @if ($mb->id == $item->mobilID)
                            {{$mb->namaMobil}} 
                            @endif
                        @endforeach </h3>
                        
                        <p>Tanggal Dipesan:    {{$item->created_at}} <br> 
                            Paket          :  {{$item->paket}} <br>
                            Diambil        : {{$item->tanggalDiambil}} <br>
                            Dikembalikan   : {{$item->tanggalDikembalikan}} <br>
                        </p>
                        @if ($item->status =='dikonfirmasi')
                            <div class="alert alert-success alert-dismissible">
                                        
                                <h5><i class="icon fas fa-check"></i> Disetujui</h5>
                            </div>
                        @elseif($item->status =='dibatalkan')
                            <div class="alert alert-danger alert-dismissible">
                                <h5><i class="icon fas fa-ban"></i> Ditolak</h5>
                            </div>
                        @else
                            <div class="alert alert-info alert-dismissible">
                                <h5><i class="icon fas fa-info"></i> Diproses</h5>
                            </div>
                        @endif
                        
                    </div>
                    @endforeach
                    
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
    <!-- /.card -->
    </section>

@endsection
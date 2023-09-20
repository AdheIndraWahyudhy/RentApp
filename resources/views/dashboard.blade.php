@extends('layout.user')

@section('title')
    Dashboard
@endsection

@section('konten')
<!-- Main content -->
<section class="content">
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-warning collapsed-card">
            <div class="card-header">
              <h5 class="card-title">Syarat ketentuan Sewa</h5>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <p>Persyaratan umum:</p>
              <ul>
                <li>Pemilik kendaraan harus berusia minimal 21 tahun.</li>
                <li>Pemilik kendaraan harus memiliki SIM (Surat Izin Mengemudi) yang masih berlaku.</li>
                <li>Calon penyewa harus memiliki identitas diri yang sah (KTP atau paspor).</li>
              </ul>
              <p>Jaminan(Deposit):</p>
              <ul>
                <li>Calon penyewa diwajibkan untuk memberikan jaminan (deposit) sebelum pengambilan kendaraan.</li>
                <li>Jumlah jaminan akan ditentukan berdasarkan jenis kendaraan yang disewa dan lamanya periode sewa.</li>
                <li>Jaminan akan dikembalikan sepenuhnya setelah masa sewa berakhir, asalkan kendaraan dikembalikan dalam kondisi baik dan tidak ada kerusakan.</li>
              </ul>
              <p>Perawatan dan Kodisi Kendaran:</p>
              <ul>
                <li>Calon penyewa memiliki hak untuk memeriksa kondisi kendaraan sebelum melakukan transaksi.</li>
                <li>Calon penyewa harus melaporkan adanya kerusakan atau masalah pada kendaraan sebelum meninggalkan lokasi pengambilan.</li>
              </ul>
              <p>Asuransi:</p>
              <ul>
                <li>Kendaraan telah dilengkapi dengan asuransi sesuai dengan ketentuan yang berlaku.</li>
                <li>Asuransi hanya berlaku untuk kecelakaan dan kerusakan kendaraan, bukan untuk hal-hal di luar ketentuan asuransi.</li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
    </div>
  </div>
</section>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card ">
            <div class="card-header">
              <h3 class="card-title">Daftar Mobil</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
              
              <div class="row ">
                @foreach ($mobil as $item)
                <div class="" style="margin:10px auto; 
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius:5px ; padding:10px; width:365px">
                  <div class="position-relative " >
                    <img src="{{url('carsImg/'.$item->gambarMobil)}}" alt="Photo 2" style="width: 100% ;object-fit: cover; height: 250px; display: block; border-radius:5px">
                    <div class="ribbon-wrapper ribbon-xl">
                      <div @if ($item->status=="Tersedia")
                            class="ribbon bg-success text-lg"
                          @else
                            class="ribbon bg-danger text-lg"
                        @endif >
                        {{$item->status}}
                      </div>
                    </div>
                  </div>
                  <h3>{{$item->namaMobil}}</h3>
                  @if ($item->status == "Tersedia")
                  <button class="button-style btn btn-success btn-sm" onclick="redirectToURL('{{url('mobil/'.$item->id)}}')" style="margin:5px" >Pesan</button>
                  @else
                  <button class="button-style btn btn-danger btn-sm" style="margin:5px" disabled>Tidak Tersedia</button>
                  @endif
                </div>
                @endforeach
                
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->



@endsection
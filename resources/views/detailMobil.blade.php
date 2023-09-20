@extends('layout.user')

@section('title')
    Detail Mobil & Form Pesan
@endsection

@section('konten')
<div class="content-header"  style="padding: 0">
  <section class="content">
      <div class="container-fluid">

      
      <!-- Default box -->
  <div class="card card-solid">
    <div class="card-header">
        <h3>Detail Mobil</h3>
    </div>
      <div class="card-body">
      <div class="row">
      <div class="col-12 col-sm-6">
          <h3 class="d-inline-block d-sm-none"></h3>
          <div class="col-12">
          <img src="{{url('/carsImg/'.$data->gambarMobil)}}" class="product-image" alt="Product Image">
          </div>
          
          <div class="col-12 product-image-thumbs">
            
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
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="card  col-12">
            <div class="card-header">
                <h3>Pemesanan</h3>
            </div>
            <div class="card-body">

                <form id="paketForm" method="POST" action="{{url('mobil/order')}}">
                    @csrf
        <div class="form-group">

            <input type="text" name="mobilID" value="{{$data->id}}" style="display: none">
            <label for="paket">Pilih Paket:</label>
            <select id="paket" name="paket" class="form-control" required>
                <option value="">--Pilih--</option>
                <option value="harian">Paket Harian</option>
                <option value="mingguan">Paket Mingguan</option>
            </select>
        </div>
        
        <div class="form-group">
            
            <label for="tanggalAmbil">Tanggal Diambil:</label>
            <input type="date" id="tanggalAmbil" name="tanggalDiambil" class="form-control" required>
            
        </div>
        <div class="form-group">
            
            <label for="jumlahHari">Jumlah <span id="paketInfo"></span>:</label>
            <input type="number" id="jumlahHari" name="jumlahHari" class="form-control" required>
        </div>
        
        <div class="form-group">
            
            <label for="hasilTanggal">Hasil Tanggal:</label>
            <input type="date" id="hasilTanggal" name="tanggalDikembalikan" class="form-control" readonly>
        </div>
        
        <div class="form-group">
            
            <label for="totalHarga">Total Harga: Rp</label>
            <input type="text" id="totalHarga" name="biaya" class="form-control" readonly>
        </div>
        <input type="submit" class="btn btn-success" value="Order">
        <a href="{{url('/admin/mobil')}}" class="btn btn-secondary">kembali</a>
    </form>
</div>
</div>
    </div>
  </div>
</section>

@endsection
@section('script')
<script>
    function hitungTotal() {
        var paket = document.getElementById('paket').value;
        var tanggalAmbil = document.getElementById('tanggalAmbil').value;
        var jumlahHari = parseInt(document.getElementById('jumlahHari').value);
  
        var hasilTanggal = new Date(tanggalAmbil);
  
        if (paket === 'harian') {
            hasilTanggal.setDate(hasilTanggal.getDate() + jumlahHari);
            document.getElementById('paketInfo').innerText = ' hari';
        } else if (paket === 'mingguan') {
            hasilTanggal.setDate(hasilTanggal.getDate() + (jumlahHari * 7));
            document.getElementById('paketInfo').innerText = ' minggu';
        }
  
        var formattedTanggal = hasilTanggal.toISOString().split('T')[0];
        document.getElementById('hasilTanggal').value = formattedTanggal;
        var totalHarga = (paket === 'harian') ? jumlahHari * {{ $data->biayaHarian }} : (paket === 'mingguan') ? jumlahHari * {{ $data->biayaMingguan }} : 0;
        document.getElementById('totalHarga').value =totalHarga;
    }
  
    // Panggil fungsi hitungTotal() saat ada perubahan pada input tanggal atau jumlah hari
    document.getElementById('tanggalAmbil').addEventListener('change', hitungTotal);
    document.getElementById('jumlahHari').addEventListener('input', hitungTotal);
  </script>
@endsection
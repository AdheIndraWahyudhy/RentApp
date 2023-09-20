
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{url('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{url('plugins/summernote/summernote-bs4.min.css')}}">
  <style>
    .card{
        margin: 2% 30%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding: 20px;
        background-color: rgba(133, 133, 133, 0.7);
        
    }
    body{
        background: url({{url('img/urban_racing_3.jpg')}});
        
        background-size: cover;
    }
    .bawah{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    @media screen and (max-width: 600px) {
    .card {
        margin:5% 10%;
    }
    }
  </style>
</head>
<body >
    <section class="content">
        <div class="container-fluid">
            <!-- jquery validation -->
            <div class="card" id="cardLogin" style="">
                <div class="card-header">
                  <h3 class="card-title" style="text-align: center">Registrasi</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @include('admin/layout/pesan')
    <form action="{{url('auth/registrasi')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">User Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{Session::get('name')}}">
        </div>
        <div class="form-group">

            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{Session::get('email')}}">
        </div>
        <div class="form-group">

            <label for="password">Password</label>
            <input type="text" id="password" name="password" class="form-control" >
        </div>
        <div class="form-group">

            <label for="phone_number">No HP</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{Session::get('phone_number')}}">
        </div>
        <div class="bawah">
            <input type="submit" value="Daftar" class="btn btn-success">
            <div>
                Sudah punya akun? Klik disini <a style="color: rgb(217, 255, 0)" href="{{url('/auth')}}">Login</a>
            </div>
        </div>
    </form>
</div>
</div>
</section>
<!-- jQuery -->
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{url('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{url('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{url('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('plugins/moment/moment.min.js')}}"></script>
<script src="{{url('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{url('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.js')}}"></script>
<script>
$(function () {
$("#example1")
.DataTable({
responsive: true,
lengthChange: false,
autoWidth: false,
buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
})
.buttons()
.container()
.appendTo("#example1_wrapper .col-md-6:eq(0)");
$("#example2").DataTable({
paging: true,
lengthChange: false,
searching: false,
ordering: true,
info: true,
autoWidth: false,
responsive: true,
});
});
</script>
<script>
function redirectToURL(url) {
window.location.href = url;
}
</script>
<script>
document.getElementById('gambarMobil').addEventListener('change', function(event) {
// Ambil file yang diunggah
const file = event.target.files[0];

// Validasi apakah file adalah gambar
if (file && file.type.startsWith('image/')) {
const reader = new FileReader();

// Ketika file berhasil dibaca
reader.onload = function() {
const previewGambarMobil = document.getElementById('previewGambarMobil');

// Atur atribut src dengan URL gambar yang telah dibaca
previewGambarMobil.src = reader.result;
previewGambarMobil.style.display = 'block'; // Tampilkan elemen gambar
};

// Baca file sebagai URL data (data URL)
reader.readAsDataURL(file);
}
});

</script>
</body>
</html>
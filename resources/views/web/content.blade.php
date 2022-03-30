<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{csrf_token()}}">

  <title>{{CRUDBooster::getSetting('appname')}}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{CRUDBooster::getSetting('favicon')}}" rel="icon">
  <link href="{{CRUDBooster::getSetting('favicon')}}"  rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Kanit:wght@200&family=Poppins&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Vendor CSS Files -->
  <link href="{{url('web/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{url('web/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('web/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{url('web/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{url('web/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{url('web/assets/vendor/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet">

  <link rel="stylesheet" href="{{url('web/assets/vendor/owlcarousel/assets/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{url('web/assets/vendor/owlcarousel/assets/owl.theme.default.min.css')}}">

  <!-- Template Main CSS File -->
  <link href="{{url('web/assets/css/style.css')}}" rel="stylesheet">
  <link href="{{url('web/assets/css/custom.css')}}" rel="stylesheet">

  @stack('css')

</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="{{url('/')}}">{{CRUDBooster::getSetting('appname')}}<span>.</span></a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="{{url('/')}}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{url('genre')}}">Genre</a></li>
          <li><a class="nav-link scrollto" href="{{url('forum')}}">Forum</a></li>
          <li><a class="nav-link scrollto" href="{{url('admin/login')}}">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  @yield('content')

   <!-- ======= Footer ======= -->
   <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-contact">
            <h3>{{CRUDBooster::getSetting('appname')}}<span>.</span></h3>
            <p>{{CRUDBooster::getSetting('alamat')}}</p>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{url('/')}}">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{url('genre')}}">Genre</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{url('forum')}}">Forum</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{url('login')}}">Login</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Sosial Media</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>{{CRUDBooster::getSetting('appname')}}</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
      <a href="https://tanlalana.com/">Designed by Tanlalna.com</a>
      </div>
    </div>
  </footer><!-- End Footer -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{url('web/assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{url('web/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{url('web/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('web/assets/vendor/jquery.min.js')}}"></script>
  <script src="{{url('web/assets/vendor/owlcarousel/owl.carousel.js')}}"></script>
  <script src="{{url('web/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{url('web/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
   <script src="{{url('web/assets/js/main.js')}}"></script>
   <script src="{{url('web/assets/vendor/sweetalert2/sweetalert2.min.js')}}"></script>
   
  <script>
            $(document).ready(function() {
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                loop: true,
                margin: 30,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:true
                    },
                    1000:{
                        items:3,
                        nav:true
                    }
                }
              });
            })
          </script>

<script>
$(function () {

$.ajaxSetup({
 headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 }
});

$('#kirim_email').click(function (e) {
 e.preventDefault();
 $(this).html('Sending..');

 var email_suscribe= $('#email_suscribe').val();
 if(email_suscribe==''){
     $('#suscribe').trigger("reset");
     $('#kirim_email').html('kirim');
     Swal.fire({
             position: 'center',
             icon: 'error',
             title: "silahkan isi email",
             showConfirmButton: false,
             timer: 5000
             })
 }else{ 
   $.ajax({
     data: $('#suscribe').serialize(),
     url: "{{url('suscribe')}}",
     type: "POST",
     dataType: 'json',
     success: function (respon) {
         if(respon.api_status=='success'){
             $('#suscribe').trigger("reset");
             $('#kirim_email').html('Kirim');
                 Swal.fire({
                 position: 'center',
                 icon: 'success',
                 title: respon.api_message,
                 showConfirmButton: false,
                 timer: 5000
                 })
         }else{
             $('#suscribe').trigger("reset");
             $('#kirim_email').html('Kirim');
             Swal.fire({
                 position: 'center',
                 icon: 'error',
                 title: respon.api_message,
                 showConfirmButton: false,
                 timer: 5000
                 })
         }    
     },
     error: function (respon) {
         $('#suscribe').trigger("reset");
         $('#kirim_email').html('Kirim');
         Swal.fire({
                 position: 'center',
                 icon: 'error',
                 title: respon.api_message,
                 showConfirmButton: false,
                 timer: 5000
                 })
         
     }
 });
}
})

$('#kirim').click(function (e) {
 e.preventDefault();
 $(this).html('Sending..');

 var email      = $('#email').val();
 var content    = $('#content').val();

 if(email=='' || content ==''  ){
     $('#kontak').trigger("reset");
     $('#kirim').html('Kirim');
     Swal.fire({
             position: 'center',
             icon: 'error',
             title: "data ada yang kosong silahkan isi semua",
             showConfirmButton: false,
             timer: 5000
             })
 }else{ 
    $.ajax({
     data: $('#kontak').serialize(),
     url: "{{url('kontak')}}",
     type: "POST",
     dataType: 'json',
     success: function (respon) {
         if(respon.api_status=='success'){
             $('#kontak').trigger("reset");
             $('#kirim').html('Kirim');
                 Swal.fire({
                 position: 'center',
                 icon: 'success',
                 title: respon.api_message,
                 showConfirmButton: false,
                 timer: 5000
                 })
         }else{
             $('#kontak').trigger("reset");
             $('#kirim').html('Kirim');
             Swal.fire({
                 position: 'center',
                 icon: 'error',
                 title: respon.api_message,
                 showConfirmButton: false,
                 timer: 5000
                 })
         }    
     },
     error: function (respon) {
         $('#kontak').trigger("reset");
         $('#kirim').html('Kirim');
         Swal.fire({
                 position: 'center',
                 icon: 'error',
                 title: respon.api_message,
                 showConfirmButton: false,
                 timer: 5000
                 })
         
     }
 });
}
 });


})
</script>


@stack('js')

</body>

</html>
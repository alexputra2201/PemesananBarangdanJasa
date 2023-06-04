<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PT Rovina Jaya Sentosa</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link rel="icon" href="{{ asset('assets/img/logorjs.png') }}">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
  <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>


 
  <style>
    trix-toolbar [data-trix-button-group="file-tools"]{
        display:none;
    }
</style>

    <!-- =======================================================
  * Template Name: eNno - v4.10.0
  * Template URL: https://bootstrapmade.com/enno-free-simple-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    @include('partials.navbarCareer')
<main>
    <section id="career" class="services section-bg">
        <div class="container pt-5">
            @yield('container')
            
        </div>
    </section><!-- End Services Section -->

</main><!-- End #main -->



<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="container footer-bottom clearfix">
        <div class="copyright">
            &copy; Copyright <strong><span>PT Rovina Jaya Sentosa</span></strong>. All Rights Reserved
        </div>


        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/enno-free-simple-bootstrap-template/ -->
            Designed by <a href="/">PT Rovina Jaya Sentosa</a>
        </div>
    </div>
</footer><!-- End Footer -->





        <!-- Vendor JS Files -->
        <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
        
        
        <!-- Template Main JS File -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
        
        <script src="{{ asset('assets/kredit.js') }}"></script>

        <script>
            var botmanWidget = {
                aboutText: 'Write Something',
                introMessage: "✋ Hi! Saya RoviBot Dari Rovina"
            };
        </script>

<script type="text/javascript">

    function showDiv(select){
       if(select.value=="mandiri"){
        document.getElementById('mandiri').style.display = "block";
        document.getElementById('btnSyariah').style.display = "none";
       } else{
        document.getElementById('mandiri').style.display = "none";
        document.getElementById('btnSyariah').style.display = "block";
       }
    } 
    </script>
        
        <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
           
</body>

</html>
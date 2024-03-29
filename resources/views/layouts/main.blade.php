<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PT Rovina Jaya Sentosa</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">



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


    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <link rel="icon" href="{{ asset('assets/img/logorjs.png') }}">

    {{-- botman --}}
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('assets/library/particle.css') }}">

    {{-- swipper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
        .swiper {
  width: 600px;
  height: 300px;
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

    @include('partials.navbar')



    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div id="particle-container">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>

        <div class="container">
            @yield('container')
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1>
                        Perumahan, Jasa Konstruksi dan Interior, <br>
                        Jasa Impor dan Penjualan Mesin Sparepart

                    </h1>
                    <h2>
                        Menyediakan produk dan jasa dalam bidang property<br>
                        yang mengedepankan kepuasan konsumen.
                    </h2>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                <!-- Slider main container -->
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide"> <img src="{{ asset('assets/Kantor/10.jpg') }}" class="img-fluid animated rounded" alt=""></div>
                        <div class="swiper-slide"> <img src="{{ asset('assets/123.jpg') }}" class="img-fluid animated rounded" alt=""></div>
                        <div class="swiper-slide"> <img src="{{ asset('assets/Kantor/8.jpg') }}" class="img-fluid animated  rounded" alt=""></div>
                        <div class="swiper-slide"> <img src="{{ asset('assets/Kantor/9.jpg') }}" class="img-fluid animated rounded" alt=""></div>
                        ...
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                    <!-- If we need scrollbar -->
                    <div class="swiper-scrollbar"></div>
                </div>
                </div>
                <!--<div class="col-lg-6 order-1 order-lg-2 hero-img">
                    {{-- <img src="assets/img/hero-img.png" class="img-fluid animated" alt=""> --}}
                    <img src="{{ asset('assets/Kantor/10.jpg') }}" class="img-fluid animated rounded" alt="">
                </div>-->
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container pt-5">

                <div class="row">

                    <div class="col-lg-4 col-md-6 mt-4 mt-md-0 mb-2">
                        <div class="icon-box">
                            <img src="{{ asset('storage/' . $products[0]->image) }}" class="card-img-top" alt="..."
                                style="max-height: 390px; max-width: 375px;">
                            <div class="card-body">
                                <h4 class="title d-flex align-content-center justify-content-center">
                                    {{ $products[0]->nama_produk }}</h4>
                                <form action="/pemesananperumnasrimbo" method="get">
                                    @csrf
                                    <button class="col-md-12 btn btn-primary">Pesan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @foreach ($jasas as $jasa)
                    <div class="col-lg-4 col-md-6 mt-4 mt-md-0 mb-2">
                        <div class="icon-box">
                            <img src="{{ asset('storage/' . $jasa->image) }}" class="card-img-top" alt="..."
                                style="max-height: 390px; max-width: 375px;">
                            <div class="card-body">
                                <h4 class="title d-flex align-content-center justify-content-center">
                                    {{ $jasa->nama_jasa }}
                                </h4>
                                @if ($jasa->nama_jasa == "Jasa Design")
                                <form action="/product/create" method="get">
                                    @csrf
                                    <button class="col-md-12 btn btn-primary">Pesan</button>
                                </form>
                                @else
                                <form action="/pemesananjasakonstruksi/create" method="get">
                                    @csrf
                                    <button class="col-md-12 btn btn-primary">Pesan</button>
                                </form>
                                @endif

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Featured Services Section -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{ asset('assets/Kantor/7.jpg') }}" class="img-fluid rounded animated"
                            style="height:500px; width:720px;" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                        <h3>PT Rovina Jaya Sentosa</h3>
                        <p class="fst-italic mt-4">
                            Pada tahun 2014, Rowi meluncurkan PT Rovina Jaya Sentosa dengan visi
                            menyediakan produk dan jasa dalam bidang property yang mengedepankan kepuasan konsumen.
                            serta misi menjadikan perumahan dan hunian masyarakat menjadi produk terpadu dengan
                            pemanfaatan
                            ruang dan lahan yang tepat, fungsi yang jelas, tata ruang higienis, sehat dan hemat energi
                            serta
                            sebagai kesatuan produk akhir yang mudah dipelihara “Easy Maintain” dan
                            Memberikan jasa kontruksi, kustomisasi produk, dengan pemanfaatan teknologi terkini agar
                            interpretasi produk tepat sasaran, “Tepat Harga, Tepat Mutu, Tepat Waktu.”
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container">

                <div class="row counters">

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="2014" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Sejak</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="21" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Total Layanan Teratas</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="21" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Masukan Positif</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="30" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Total Karyawan</p>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container">

                <div class="section-title">
                    <span>Bisnis Kami</span>
                    <h2>Bisnis Kami</h2>
                </div>

                <div class="row grid">
                    <div class="col-6">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-home"></i></div>
                            <h4><a href="">Perumahan</a></h4>
                            <p>PT Rovina memiliki project perumahan yang terdapat di Rimbo Panjang dan Simpang 3
                                Pekanbaru</p>
                        </div>
                    </div>

                    <div class="col-6 mt-4 mt-md-0">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4><a href="">Jasa Impor</a></h4>
                            <p>PT Rovina menyediakan jasa impor barang untuk memenuhi kebutuhan pelanggan</p>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-world"></i></div>
                            <h4><a href="">Konstruksi dan Design</a></h4>
                            <p>PT Rovina dapat mendesign segala kebutuhan property ataupun renovasi rumah</p>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-slideshow"></i></div>
                            <h4><a href="">Mesin Sparepart PLN</a></h4>
                            <p>PT Rovina menyediakan jasa penjualan mesin sparepart yang dibutuhkan client</p>
                        </div>
                    </div>
                </div>


            </div>
        </section><!-- End Services Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">

                <div class="section-title">
                    <span>Proyek Kami </span>
                    <h2>Proyek Kami</h2>

                </div>

                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            @foreach ($project as $p)
                            <li data-filter=".filter-{{ $p->nama_project }}" class="filter">{{ $p->nama_project }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container">
                    @foreach ($projects as $project)

                    <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $project->nama_project }}">
                        {{-- <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt=""> --}}
                        <img src="{{ asset('storage/' . $project->image) }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>{{ $project->nama_project }}</h4>
                            <a href="{{ asset('storage/' . $project->image) }}" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="{{ $project->nama_project }}"><i
                                    class="bx bx-search"></i></a>
                        </div>
                    </div>

                    @endforeach


                </div>

            </div>
        </section><!-- End Portfolio Section -->


        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact section-bg">
            <div class="container">

                <div class="section-title">
                    <span>Kontak</span>
                    <h2>Kontak</h2>
                </div>
                <div class="row">
                    <div class="col">
                        <iframe src="https://maps.google.com/maps?q=pt%20rovina&t=&z=17&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                    </div>
                    <div class="col">
                        <img src="{{ asset('assets/Ruko.png') }}" alt="{{ asset('assets/Ruko.png') }}"
                            style="border:0; width: 100%; height: 290px;">
                    </div>

                    <div class="col">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>Jl. Soekarno-Hatta, Delima, Kec. Tampan, Kota Pekanbaru, Riau 28292</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>rovina@gmail.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>082381103311</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Contact Section -->

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



    <div class="whatsappp" style="
        position: fixed;
        left: 20px;
        bottom: 16px;
        z-index: 2200000000;
      ">

        <a href="https://wa.me/+6282381103311?" style="color:#14c871">
            <i class="fa fa-whatsapp" style="font-size:72px"></i>
        </a>

    </div>



    {{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>
            --}}



    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    {{-- swipper --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

</body>


{{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css"> --}}
<script>
    const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // And if we need scrollbar
        scrollbar: {
            el: '.swiper-scrollbar',
        },
    });

    var botmanWidget = {
        // frameEndpoint: '/iFrameUrl',
        aboutText: 'Write Something',
        introMessage: "✋ Hi! Saya RoviBot Dari Rovina",
        bubbleAvatarUrl: "{{ asset('assets/chat (1).png') }}"
    };
</script>

<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>


</html>
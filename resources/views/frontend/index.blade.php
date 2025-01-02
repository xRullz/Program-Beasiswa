<!DOCTYPE html>
<html lang="en">

<head>
    <title>Beasiswa &mdash; PKN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="assets/css/aos.css">

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>


        <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

            <div class="container-fluid">
                <div class="d-flex align-items-center">
                    <div class="site-logo mr-auto w-30">
                        <a href="/" class="site-logo">
                            <img src="assets/images/pkn.png" alt="logo" style="width: 90px; margin-left: 80px"
                                class="img-fluid">
                        </a>
                    </div>
                    <div class="mx-auto text-center">
                        <nav class="site-navigation position-relative text-right" role="navigation">
                            <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                                <li><a href="#home-section" class="nav-link">Beranda</a></li>
                                <li><a href="#courses-section" class="nav-link">Beasiswa</a></li>
                                <li><a href="#programs-section" class="nav-link">Program</a></li>
                                <li><a href="#contact-section" class="nav-link">Hubungi</a></li>
                            </ul>
                        </nav>
                    </div>

                    <div class="ml-auto w-25">
                        <nav class="site-navigation position-relative text-right" role="navigation">
                            <ul
                                class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                                <li class="cta"><button type="button" class="btn btn-primary btn-sm"
                                        data-toggle="modal" data-target="#modalLogin"><span>Login</span></button></li>
                            </ul>
                        </nav>
                        <a href="#"
                            class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span
                                class="icon-menu h3"></span>
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <div class="intro-section" id="home-section">
            <div class="slide-1" style="background-image: url('assets/images/kuliah1.jpg');"
                data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="row align-items-center">
                                <div class="col-lg-6 mb-4">
                                    <h1 data-aos="fade-up" data-aos-delay="100">Jembatan Masa Depan</h1>
                                    <h1 data-aos="fade-up" data-aos-delay="100">Beasiswa Perguruan Tinggi</h1>
                                    <p class="mb-4" data-aos="fade-up" data-aos-delay="200">PT. Pesona Khatulistiwa
                                        Nusantara</p>
                                    <p class="mb-4" data-aos="fade-up" data-aos-delay="200">Selamat datang di Beasiswa
                                        PT Pesona Khatulistiwa Nusantara!
                                        Kami percaya bahwa pendidikan adalah kunci untuk membuka pintu
                                        masa depan yang cerah.</p>
                                    <p data-aos="fade-up" data-aos-delay="300"><a href="#"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="site-section courses-title" id="courses-section">
            <div class="container">
                <div class="row mb-5 justify-content-center">
                    <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
                        <h2 class="section-title">Beasiswa</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-section courses-entry-wrap" data-aos="fade-up" data-aos-delay="100">
            <div class="container">
                <div class="row">
                    <div class="owl-carousel col-12 nonloop-block-14">
                        <!-- Course Item 1 -->
                        @foreach ($scholarships as $data)
                            <div class="course bg-white h-100 align-self-stretch">
                                <figure class="m-0">
                                    <a href="course-single.html"><img src="{{ asset('storage/' . $data->image) }}"
                                            alt="Image" class="img-fluid"></a>
                                </figure>
                                <div class="course-inner-text py-4 px-4">
                                    <div class="meta"><span class="icon-clock-o">Batas
                                            Pendaftaran:</span>{{ date('d M Y', strtotime($data->deadline)) }}</div>
                                    <h3><a href="#">{{ $data->title }}</a></h3>
                                    <p>{{ $data->description }}</p>
                                </div>
                                <div class="d-flex border-top stats">
                                    <div class="py-3 px-4"><span class="icon-users"></span> Kuota</div>
                                    <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span>
                                        {{ $data->amount }}
                                    </div>
                                </div>
                                <div class="py-3 text-center">
                                    <a href="#" class="btn btn-primary" data-toggle="modal"
                                        data-target="#registrationModal" data-id="{{ $data->id }}"
                                        onclick="setScholarshipId({{ $data->id }})">Daftar</a>
                                </div>
                            </div>
                        @endforeach
                        <!-- Add more courses if needed -->
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-7 text-center">
                        <button class="customPrevBtn btn btn-primary m-1">Prev</button>
                        <button class="customNextBtn btn btn-primary m-1">Next</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="registrationModal" tabindex="-1" role="dialog"
            aria-labelledby="registrationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registrationModalLabel">Register and Apply for Scholarship</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="registrationForm" method="POST" action="/applications/register"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="container-fluid">
                                <input type="hidden" name="scholarship_id" id="scholarship_id" value="">
                                <h4>Personal Information</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Full Name:</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" name="email" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="address">Address:</label>
                                    <input type="text" name="address" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number:</label>
                                    <input type="text" name="phone" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="birthdate">Birthdate:</label>
                                    <input type="date" name="birthdate" class="form-control" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="birthdate">Sekolah Asal:</label>
                                            <input type="text" name="school" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="birthdate">Jurusan (Opsional):</label>
                                            <input type="text" name="major" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="documents">Upload Berkas Raport Semester 1-5:</label>
                                    <input type="file" name="documents[]" class="form-control" multiple required>
                                    <span class="text-muted d-block">Upload dalam bentuk PDF</span>
                                </div>

                                <h4>Account Information</h4>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password:</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        required>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Register and Apply</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="site-section" id="programs-section">
            <div class="container">
                <div class="row mb-5 justify-content-center">
                    <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
                        <h2 class="section-title">Program Kami</h2>
                        <p> Program beasiswa ini, kami
                            berkomitmen untuk mendukung talenta-talenta terbaik dari seluruh
                            penjuru nusantara, memberikan kesempatan bagi Anda untuk
                            berkembang dan meraih impian. </p>
                    </div>
                </div>
                <div class="row mb-5 align-items-center">
                    <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/images/undraw_youtube_tutorial.svg" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
                        <h2 class="text-black mb-4">Mendukung Talenta Terbaik</h2>
                        <p class="mb-4">Memberikan peluang bagi individu berbakat untuk mengembangkan potensi terbaik
                            mereka.</p>
                    </div>
                </div>

                <div class="row mb-5 align-items-center">
                    <div class="col-lg-7 mb-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/images/undraw_teaching.svg" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-lg-4 mr-auto order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                        <h2 class="text-black mb-4">Mempermudah Akses Pendidikan</h2>
                        <p class="mb-4">Membantu mereka yang berprestasi tapi terkendala biaya agar bisa melanjutkan
                            pendidikan.</p>
                    </div>
                </div>

                <div class="row mb-5 align-items-center">
                    <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/images/undraw_teacher.svg" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
                        <h2 class="text-black mb-4">Mendorong Kepemimpinan dan Inovasi</h2>
                        <p class="mb-4">Menumbuhkan pemimpin masa depan yang dapat memberikan dampak positif di
                            masyarakat.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section bg-image overlay" style="background-image: url('assets/images/visimisi.png');">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-8 text-center testimony">
                        <img src="assets/images/pkn.png" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                        <h3 class="mb-4">PT. Pesona Khatulistiwa Nusantara</h3>
                        <blockquote>
                            <p>&ldquo; Meningkatkan kualitas hidup masyarakat sehingga dapat memberikan kemakmuran yang
                                berkelanjutan dan oleh karena itu mendapatkan rasa hormat dan dihargai oleh seluruh
                                pihak
                                terkait. &rdquo;</p>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section pb-0">

            <div class="future-blobs">
                <div class="blob_2">
                    <img src="assets/images/blob_2.svg" alt="Image">
                </div>
                <div class="blob_1">
                    <img src="assets/images/blob_1.svg" alt="Image">
                </div>
            </div>
            <div class="container">
                <div class="row mb-5 justify-content-center" data-aos="fade-up" data-aos-delay="">
                    <div class="col-lg-7 text-center">
                        <h2 class="section-title">Harapan Program Kami</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto align-self-start" data-aos="fade-up" data-aos-delay="100">

                        <div class="p-4 rounded bg-white why-choose-us-box">

                            <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                                <div class="mr-3"><span class="custom-icon-inner"><span
                                            class="icon icon-graduation-cap"></span></span></div>
                                <div>
                                    <h3 class="m-0">Mencetak Generasi Unggul</h3>
                                </div>
                            </div>

                            <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                                <div class="mr-3"><span class="custom-icon-inner"><span
                                            class="icon icon-university"></span></span></div>
                                <div>
                                    <h3 class="m-0">Menyediakan Kesempatan yang Sama</h3>
                                </div>
                            </div>

                            <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                                <div class="mr-3"><span class="custom-icon-inner"><span
                                            class="icon icon-graduation-cap"></span></span></div>
                                <div>
                                    <h3 class="m-0">Menghasilkan Pemimpin Masa Depan</h3>
                                </div>
                            </div>

                            <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                                <div class="mr-3"><span class="custom-icon-inner"><span
                                            class="icon icon-university"></span></span></div>
                                <div>
                                    <h3 class="m-0">Meningkatkan Akses Pendidikan</h3>
                                </div>
                            </div>

                            <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                                <div class="mr-3"><span class="custom-icon-inner"><span
                                            class="icon icon-graduation-cap"></span></span></div>
                                <div>
                                    <h3 class="m-0">Menciptakan Dampak Sosial yang Bermakna</h3>
                                </div>
                            </div>

                            <div class="d-flex align-items-center custom-icon-wrap custom-icon-light">
                                <div class="mr-3"><span class="custom-icon-inner"><span
                                            class="icon icon-university"></span></span></div>
                                <div>
                                    <h3 class="m-0">Mencetak Generasi Unggul</h3>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-7 align-self-end" data-aos="fade-left" data-aos-delay="200">
                        <img src="assets/images/person_transparent.png" alt="Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section bg-light" id="contact-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <h2 class="section-title mb-3">Hubungi Kami</h2>
                        <p class="mb-5">Jika Anda memiliki pertanyaan atau ingin mendapatkan informasi lebih lanjut
                            mengenai program beasiswa atau lainnya, jangan ragu untuk menghubungi kami. Kami siap
                            membantu!
                        </p>
                        <form method="post" action="/contacts/store" data-aos="fade">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Full name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea class="form-control" id="" name="message" cols="30" rows="10"
                                        placeholder="Write your message here."></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-primary py-3 px-5 btn-block btn-pill"
                                        value="Send Message">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer-section bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h3>TENTANG PT. Pesona Khatulistiwa Nusantara</h3>
                        <p>PT Pesona Khatulistiwa Nusantara (PT PKN) adalah perusahaan yang bergerak di bidang
                            pertambangan
                            batubara pemegang izin Perjanjian Karya Pengusahaan Pertambangan Batubara (PKP2B) Generasi
                            III.
                            PT Pesona Khatulistiwa Nusantara mendapatkan izin operasional sejak tanggal 15 Februari 2009
                            hingga 14 Februari 2039.</p>
                    </div>

                    <div class="col-md-3 ml-auto">
                        <h3>Links</h3>
                        <ul class="list-unstyled footer-links">
                            <li><a href="https://www.youtube.com/@pkncoal">Youtube</a></li>
                            <li><a href="https://www.instagram.com/pkncoal/">Instagram</a></li>
                            <li><a href="https://pkncoal.com/">Website</a></li>
                            <li><a
                                    href="https://id.linkedin.com/company/pt.-pesona-khatulistiwa-nusantara">LinkEdIN</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-4">
                        <h3>Wilayah</h3>
                        <p>Wilayah operasional seluas 21.875 Ha terbagi menjadi 2 blok yaitu blok utara dan blok
                            selatan.
                            Pada blok utara terbagi menjadi 2 area yaitu area Kelubir dan Ardimulyo sedangkan blok
                            selatan
                            juga terbagi menjadi 2 area yaitu area Sekayan dan Rangau.</p>
                    </div>

                </div>

                <div class="row pt-5 mt-5 text-center">
                    <div class="col-md-12">
                        <div class="border-top pt-5">
                            <p>
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | Kelompok Jeruk
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div> <!-- .site-wrap -->

    <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLongTitle">Login</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/login" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email ...">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password ...">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}

    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.stellar.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <script src="assets/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/js/jquery.easing.1.3.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/jquery.fancybox.min.js"></script>
    <script src="assets/js/jquery.sticky.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
        function setScholarshipId(id) {
            document.getElementById('scholarship_id').value = id;
        }
    </script>
</body>

</html>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>{{$title}} | Gelar Karya</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    {{-- <link rel="manifest" href="/favicons/manifest.json" /> --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/logo/loder.png')}}" />

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/progressbar_barfiller.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/gijgo.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/animated-headline.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
  </head>

  <body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
      <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
          <div class="preloader-circle"></div>
          <div class="preloader-img pere-text">
            <img src="{{asset('assets/img/logo/loder.png')}}" alt="" />
          </div>
        </div>
      </div>
    </div>
    <!-- Preloader Start -->
    <header>
      <!-- Header Start -->
      <div class="header-area header-transparent">
        <div class="main-header">
          <div class="header-bottom header-sticky">
            <div class="container-fluid">
              <div class="row align-items-center">
                <!-- Logo -->
                <div class="col-xl-2 col-lg-2">
                  <div class="logo">
                    <a href="/"><img src="{{asset('assets/img/logo/manuk.png')}}" alt="" style="width: 200px" /></a>
                  </div>
                </div>
                <div class="col-xl-10 col-lg-10">
                  <div class="menu-wrapper d-flex align-items-center justify-content-end">
                    <!-- Main-menu -->
                    <div class="main-menu d-none d-lg-block">
                      <nav>
                        <ul id="navigation">
                          <li class="active"><a href="/">Beranda</a></li>
                          <li>
                            <a href="#">Kategori</a>
                            <ul class="submenu">
                              @foreach ($lombas as $lomba)
                                  <li><a href="/lomba/{{$lomba->id}}/{{$lomba->kategori}}">{{$lomba->kategori}}</a></li>
                              @endforeach
                            </ul>
                          </li>
                          <li>
                            <a href="#">Informasi</a>
                            <ul class="submenu">
                              <li><a href="/jadwal">Jadwal</a></li>
                              <li><a href="/hasil-lomba">Hasil Lomba</a></li>
                            </ul>
                          </li>
                          <li>
                            <a href="/hasil-karya">Hasil Karya</a>
                          </li>
                          <li><a href="/kontak">Kontak</a></li>
                          <!-- Button -->
                          @if(!Auth::check())
                            <li class="button-header"><a href="/login" class="btn btn3">Masuk</a></li>  
                          @endif
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
                <!-- Mobile Menu -->
                <div class="col-12">
                  <div class="mobile_menu d-block d-lg-none"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Header End -->
    </header>
    @yield('container')
    <footer>
      <div class="footer-wrappper footer-bg">
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
          <div class="container">
            <div class="row justify-content-between">
              <div class="col-xl-4 col-lg-5 col-md-4 col-sm-6">
                <div class="single-footer-caption mb-50">
                  <div class="single-footer-caption mb-30">
                    <!-- logo -->
                    <div class="footer-logo mb-25">
                      <a href="/"><img src="{{asset('assets/img/logo/manuk.png')}}" alt="" style="width: 300px" /></a>
                    </div>
                    <div class="footer-tittle">
                      <div class="footer-pera">
                        <p>Terinspirasi oleh Bakat, Membangun Kreativitas, Meraih Gelar Karya</p>
                      </div>
                    </div>
                    <!-- social -->
                    <div class="footer-social">
                      <a href="https://twitter.com/bptik_dikbud"><i class="fab fa-twitter"></i></a>
                      <a href="https://m.facebook.com/people/BPTIK-Dikbud-Prov-Jawa-Tengah/100063653527054/?locale=id_ID"><i class="fab fa-facebook-f"></i></a>
                      <a href="https://www.instagram.com/bptik_dikbud/"><i class="fab fa-instagram"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-7 col-lg-3 col-md-4 col-sm-5">
                <div class="single-footer-caption mb-50">
                  <div class="footer-tittle">
                    <h4>Balai Pengembangan Teknologi Informasi dan Komunikasi Pendidikan dan Kebudayaan Jawa Tengah</h4>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area">
          <div class="container">
            <div class="footer-border">
              <div class="row d-flex align-items-center">
                <div class="col-xl-12">
                  <div class="footer-copy-right text-center">
                    <p>
                      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                      Copyright &copy;
                      <script>
                        document.write(new Date().getFullYear());
                      </script>
                      All rights reserved
                      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Footer End-->
      </div>
    </footer>
    <!-- Scroll Up -->
    <div id="back-top">
      <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->
    <script src="{{asset('./assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{asset('./assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('./assets/js/popper.min.js')}}"></script>
    <script src="{{asset('./assets/js/bootstrap.min.js')}}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{asset('./assets/js/jquery.slicknav.min.js')}}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{asset('./assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('./assets/js/slick.min.js')}}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{asset('./assets/js/wow.min.js')}}"></script>
    <script src="{{asset('./assets/js/animated.headline.js')}}"></script>
    <script src="{{asset('./assets/js/jquery.magnific-popup.js')}}"></script>

    <!-- Date Picker -->
    <script src="{{asset('./assets/js/gijgo.min.js')}}"></script>
    <!-- Nice-select, sticky -->
    <script src="{{asset('./assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('./assets/js/jquery.sticky.js')}}"></script>
    <!-- Progress -->
    <script src="{{asset('./assets/js/jquery.barfiller.js')}}"></script>

    <!-- counter , waypoint,Hover Direction -->
    <script src="{{asset('./assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('./assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('./assets/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('./assets/js/hover-direction-snake.min.js')}}"></script>

    <!-- contact js -->
    <script src="{{asset('./assets/js/contact.js')}}"></script>
    <script src="{{asset('./assets/js/jquery.form.js')}}"></script>
    <script src="{{asset('./assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('./assets/js/mail-script.js')}}"></script>
    <script src="{{asset('./assets/js/jquery.ajaxchimp.min.js')}}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{asset('./assets/js/plugins.js')}}"></script>
    <script src="{{asset('./assets/js/main.js')}}"></script>
  </body>
</html>

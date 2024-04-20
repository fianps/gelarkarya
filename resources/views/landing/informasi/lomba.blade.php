@extends('landing.layout')

@section('container')
<main>
    <!--? slider Area Start-->
    <section class="slider-area slider-area2">
      <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height2">
          <div class="container">
            <div class="row">
              <div class="col-xl-8 col-lg-11 col-md-12">
                <div class="hero__caption hero__caption2">
                  <h1 data-animation="bounceIn" data-delay="0.2s">Detail Perlombaan</h1>
                  <!-- breadcrumb Start-->
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                      <li class="breadcrumb-item"><a href="">Lomba</a></li>
                      <li class="breadcrumb-item"><a href="">Detail</a></li>
                    </ol>
                  </nav>
                  <!-- breadcrumb End -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="blog_area single-post-area section-padding">
      <div class="container">
        <div class="row">
          <div class="single-post">
            <div class="blog_details">
              <h1 style="color: #2d2d2d">{{$lomba->kategori}}</h1>
              <ul class="blog-info-link mt-3 mb-4">
                <li>
                  <a href="#">Batas Waktu Pendaftaran </a>
                </li>
                <li>
                  <a href="#"> {{$lomba->tanggal_akhir}}</a>
                </li>
              </ul>
              <p class="excert">{{$lomba->deskripsi}}</p>
              <h3 style="color: #2d2d2d">Aturan Perlombaan</h3>
              <p>{{$lomba->aturan}}</p>
              <h3 style="color: #2d2d2d">Penilaian Lomba</h3>
              <p>{{$lomba->penilaian}}</p>
              <h3 style="color: #2d2d2d">Ketentuan Khusus</h3>
              <p>{{$lomba->ketentuan}}</p>
            </div>
            <a href="/lomba/{{$lomba->id}}/{{$lomba->kategori}}/daftar" class="button button-contactForm btn_1 boxed-btn mt-4">
              Daftar
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- Blog Area End -->
  </main>
@endsection
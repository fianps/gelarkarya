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
                  <h1 data-animation="bounceIn" data-delay="0.2s">Berita Terkini</h1>
                  <!-- breadcrumb Start-->
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                      <li class="breadcrumb-item"><a href="/">Informasi</a></li>
                      <li class="breadcrumb-item"><a href="#">Detail</a></li>
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
            @if ($berita->judul == 'Jadwal')
            <div class="feature-img">
              <img src="{{asset('assets/img/gallery/topic8.png')}}" alt="" class="img-fluid" width="50%"  />
            </div>
            @else
            <div class="feature-img">
              <img class="img-fluid" width="50%" src="{{asset('storage/berita/'.$berita->gambar)}}" alt="ini gambar loh" />
            </div>
            @endif
            <div class="blog_details mb-4">
              <h1 style="color: #2d2d2d">{{$berita->judul}}</h1>
              <ul class="blog-info-link mt-3 mb-4">
                <li>
                  <a href="#">Ditayangkan </a>
                </li>
                <li>
                  <a href="#"> {{$berita->created_at}}</a>
                </li>
              </ul>
              <p class="excert">{{$berita->deskripsi}}</p>
            </div>
            @if ($berita->judul == 'Jadwal')
            <div class="button-header">
              <a href="/jadwal" class="btn hero-btn">Lihat Di Sini</a>
            </div>
            @endif
          </div>
        </div>
      </div>
    </section>
    <!-- Blog Area End -->
  </main>
@endsection
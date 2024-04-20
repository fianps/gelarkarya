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
                  <h1 data-animation="bounceIn" data-delay="0.2s">Detail Karya Peserta</h1>
                  <!-- breadcrumb Start-->
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                      <li class="breadcrumb-item"><a href="/hasil-karya">Hasil Karya</a></li>
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
            <div class="feature-img">
              @if (pathinfo($karya->karya, PATHINFO_EXTENSION) == 'jpg' || pathinfo($karya->karya, PATHINFO_EXTENSION) == 'png' || pathinfo($karya->karya, PATHINFO_EXTENSION) == 'jpeg' || pathinfo($karya->karya, PATHINFO_EXTENSION) == 'gif')
                <img class="img-fluid" src="{{asset('storage/pendaftar/karya/'.$karya->karya)}}" alt="ini gambar">
              @else
                <iframe height="350" width="610" src="{{asset('storage/pendaftar/karya/'.$karya->karya)}}"></iframe>
              @endif
            </div>
            <div class="blog_details">
              <h1 style="color: #2d2d2d">{{$karya->judul}}</h1>
              <ul class="blog-info-link mt-3 mb-4">
                <li>
                  <a href="#">Tanggal Dibuat </a>
                </li>
                <li>
                  <a href="#"> {{Carbon\Carbon::parse($karya->created_at)->format('d F Y')}}</a>
                </li>
              </ul>
              <p class="excert">
                {{$karya->deskripsi}}}
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Blog Area End -->
  </main>
@endsection
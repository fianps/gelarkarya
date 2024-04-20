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
                <h1 data-animation="bounceIn" data-delay="0.2s">Jadwal Lomba</h1>
                <!-- breadcrumb Start-->
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="#">Jadwal</a></li>
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
  <section class="sample-text-area">
    <div class="container box_1170">
      <!-- ? services-area -->
      <div class="services-area">
        <div class="container">
          <h3 class="mt-5">Jadwal Pelaksanaan Gelar Karya</h3>
          <div class="row justify-content-sm-center">
            <div class="col-lg-4 col-md-6 col-sm-8">
              <div class="single-services mb-30">
                <div class="features-icon">
                  <h1 class="mb-50">01</h1>
                </div>
                <div class="features-caption">
                  <h3>Pendaftaran</h3>
                  <p>{{Carbon\Carbon::parse($berita->tgl_pendaftaran)->format('d')}}-{{$lomba}}</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
              <div class="single-services mb-30">
                <div class="features-icon">
                  <h1 class="mb-50">02</h1>
                </div>
                <div class="features-caption">
                  <h3>Verifikasi</h3>
                  <p>{{Carbon\Carbon::parse($berita->tgl_seleksi1)->format('d F Y')}}</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
              <div class="single-services mb-30">
                <div class="features-icon">
                  <h1 class="mb-50">03</h1>
                </div>
                <div class="features-caption">
                  <h3>Seleksi</h3>
                  <p>{{Carbon\Carbon::parse($berita->tgl_seleksi2)->format('d F Y')}}</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
              <div class="single-services mb-30">
                <div class="features-icon">
                  <h1 class="mb-50">04</h1>
                </div>
                <div class="features-caption">
                  <h3>Pengumuman Pemenang</h3>
                  <p>{{Carbon\Carbon::parse($berita->tgl_pengumuman)->format('d F Y')}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
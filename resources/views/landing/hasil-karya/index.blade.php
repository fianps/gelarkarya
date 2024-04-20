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
                  <h1 data-animation="bounceIn" data-delay="0.2s">Hasil Karya Peserta</h1>
                  <!-- breadcrumb Start-->
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                      <li class="breadcrumb-item"><a href="#">Hasil Karya</a></li>
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
        <h3>Karya Terbaik</h3>
        <div class="row gallery-item">
          @foreach ($terbaiks as $terbaik)
            <div class="col-md-4">
              <a href="/hasil-karya/detail/{{$terbaik->id}}">
                <div class="single-gallery-image" style="overflow: hidden;" ><img style="height: 200px" src="{{asset('storage/pendaftar/thumbnail/'.$terbaik->thumbnail)}}" alt="" srcset=""></div>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- Courses area start -->
    @if($smas->count() != 0)    
    <div class="courses-area section-padding40 fix">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 col-lg-8">
            <div class="section-tittle text-center mb-55">
              <h2>Karya SMA Terbaik</h2>
            </div>
          </div>
        </div>
        <div class="courses-actives">
          @foreach ($smas as $sma)
          <!-- Single -->
          <div class="properties pb-20">
            <div class="properties__card">
              <div class="properties__img overlay1">
                <a href="/hasil-karya/detail/{{$sma->id}}"><img src="{{asset('storage/pendaftar/thumbnail/'.$sma->thumbnail)}}" alt="" /></a>
              </div>
              <div class="properties__caption">
                <h3><a href="/hasil-karya/detail/{{$sma->id}}">{{$sma->judul}}</a></h3>
                <a href="/hasil-karya/detail/{{$sma->id}}" class="border-btn border-btn2">Lihat Selengkapnya</a>
              </div>
            </div>
          </div>
          <!-- / Single -->
          @endforeach
        </div>
      </div>
    </div>
    @endif
    <!-- Courses area End -->
    <!-- Courses area start -->
    @if($smps->count() != 0)
    <div class="courses-area section-padding40 fix">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 col-lg-8">
            <div class="section-tittle text-center mb-55">
              <h2>Karya SMP Terbaik</h2>
            </div>
          </div>
        </div>
        <div class="courses-actives">
            @foreach ($smps as $smp)
            <!-- Single -->
            <div class="properties pb-20">
              <div class="properties__card">
                <div class="properties__img overlay1">
                  <a href="/hasil-karya/detail/{{$smp->id}}"><img src="{{asset('storage/pendaftar/thumbnail/'.$smp->thumbnail)}}" alt="" /></a>
                </div>
                <div class="properties__caption">
                  <h3><a href="/hasil-karya/detail/{{$smp->id}}">{{$smp->judul}}</a></h3>
                  <a href="/hasil-karya/detail/{{$smp->id}}" class="border-btn border-btn2">Lihat Selengkapnya</a>
                </div>
              </div>
            </div>
            <!-- / Single -->
            @endforeach
        </div>
      </div>
    </div>
    @endif
    <!-- Courses area End -->
    <!-- Courses area start -->
    @if($sds->count() != 0)
    <div class="courses-area section-padding40 fix">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 col-lg-8">
            <div class="section-tittle text-center mb-55">
              <h2>Karya SD Terbaik</h2>
            </div>
          </div>
        </div>
        <div class="courses-actives">
            @foreach ($sds as $sd)
            <!-- Single -->
            <div class="properties pb-20">
              <div class="properties__card">
                <div class="properties__img overlay1">
                  <a href="/hasil-karya/detail/{{$sd->id}}"><img src="{{asset('storage/pendaftar/thumbnail/'.$sd->thumbnail)}}" alt="" /></a>
                </div>
                <div class="properties__caption">
                  <h3><a href="/hasil-karya/detail/{{$sd->id}}">{{$sd->judul}}</a></h3>
                  <a href="/hasil-karya/detail/{{$sd->id}}" class="border-btn border-btn2">Lihat Selengkapnya</a>
                </div>
              </div>
            </div>
            <!-- / Single -->
            @endforeach
        </div>
      </div>
    </div>
    @endif
    <!-- Courses area End -->

    <!-- Blog Area End -->
  </main>
@endsection
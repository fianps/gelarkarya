@extends('landing.layout')

@section('container')
<main>
    <!--? slider Area Start-->
    <section class="slider-area">
      <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height d-flex align-items-center">
          <div class="container">
            <div class="row">
              <div class="col-xl-6 col-lg-7 col-md-12">
                <div class="hero__caption">
                  <h1 data-animation="fadeInLeft" data-delay="0.2s">
                    Siapkan dirimu untuk berkompetisi<br />
                    dalam Gelar Karya
                  </h1>
                  <p data-animation="fadeInLeft" data-delay="0.4s">
                    Gelar Karya adalah platform inovatif yang menghubungkan para pelajar, guru, dan pecinta kreativitas dalam sebuah perlombaan yang mempromosikan bakat dan kemampuan mereka. 
                    Di sini, Anda dapat mengeksplorasi dan menyaksikan beragam karya kreatif yang menginspirasi dari berbagai disiplin ilmu dan seni.
                  </p>
                  @if(!Auth::check())
                    <a href="/register" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.7s">Daftar Sekarang</a>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ? services-area -->
    <div class="services-area">
      <div class="container">
        <div class="row justify-content-sm-center">
          <div class="col-lg-4 col-md-6 col-sm-8">
            <div class="single-services mb-30">
              <div class="features-icon">
                <img src="assets/img/icon/icon1.svg" alt="" />
              </div>
              <div class="features-caption">
                <h3>Sarana Berkarya</h3>
                <p>Ruang bagi inspirasi, eksplorasi, dan ekspresi tanpa batas</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-8">
            <div class="single-services mb-30">
              <div class="features-icon">
                <img src="assets/img/icon/icon2.svg" alt="" />
              </div>
              <div class="features-caption">
                <h3>Wadah Kepedulian</h3>
                <p>Tempat di Mana Kepedulian Menemukan Ekspresinya</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-8">
            <div class="single-services mb-30">
              <div class="features-icon">
                <img src="assets/img/icon/icon3.svg" alt="" />
              </div>
              <div class="features-caption">
                <h3>Ajang Kreatif</h3>
                <p>Mendorong bakat untuk berkilau dalam cahaya sorotan</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Courses area start -->
    @if($beritas->count() > 0)
    <div class="courses-area section-padding40 fix">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 col-lg-8">
            <div class="section-tittle text-center mb-55">
              <h2>Berita Terkini</h2>
            </div>
          </div>
        </div>
        <div class="courses-actives">
          <!-- Single -->
          @foreach($beritas as $berita)
          <div class="properties pb-20">
            <div class="properties__card">
              <div class="properties__img overlay1">
                <a href="/berita-terkini/{{$berita->id}}">@if($berita->gambar == null)
                  <img src="{{asset('assets/img/gallery/topic8.png')}}" alt="" />
                @else<img src="{{asset('storage/berita/'.$berita->gambar)}}" alt="" />@endif</a>
              </div>
              <div class="properties__caption">
                <h3><a href="/berita-terkini/{{$berita->id}}">{{$berita->judul}}</a></h3>
                <p>{{Str::limit($berita->deskripsi, 140)}}</p>
                <a href="/berita-terkini/{{$berita->id}}" class="border-btn border-btn2">Pelajari Lebih Lanjut</a>
              </div>
            </div>
          </div>
          @endforeach
          <!-- / Single -->
        </div>
      </div>
    </div>
    @endif
    <!-- Courses area End -->
    <!--? About Area-2 Start -->
    <section class="about-area2 fix pb-padding">
      <div class="support-wrapper align-items-center">
        <div class="right-content2">
          <!-- img -->
          <div class="right-img">
            <img src="assets/img/gallery/about2.png" alt="" />
          </div>
        </div>
        <div class="left-content2">
          <!-- section tittle -->
          <div class="section-tittle section-tittle2 mb-20">
            <div class="front-text">
              <h2 class="">Tentang Gelar Karya</h2>
              <p>
                Gelar Karya adalah ajang prestisius yang menghadirkan para pelajar, guru, dan pencipta kreatif dari seluruh negeri untuk berkompetisi dan memamerkan bakat mereka. Dalam perlombaan ini, kami memberikan kesempatan kepada peserta untuk mengekspresikan kreativitas mereka melalui beragam kategori yang mencakup seni visual, pertunjukan, desain, penulisan, ilmu pengetahuan, dan banyak lagi.

Kami percaya bahwa setiap individu memiliki potensi kreatif yang luar biasa, dan melalui Gelar Karya, kami ingin memberikan platform yang menginspirasi dan mendorong mereka untuk mengungkapkan bakat tersembunyi mereka. Dalam setiap kategori, peserta akan bersaing dengan sesama pencipta yang berbakat dan dihadapkan pada juri yang berpengalaman.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- About Area End -->
    <!--? top subjects Area Start -->
    @if($lombas->count() > 0)
    <div class="topic-area section-padding40">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 col-lg-8">
            <div class="section-tittle text-center mb-55">
              <h2>Kategori Lomba</h2>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          @foreach ($lombas as $lomba)    
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="single-topic text-center mb-30">
              <div class="topic-img">
                <img src="assets/img/gallery/topic1.png" alt="" />
                <div class="topic-content-box">
                  <div class="topic-content">
                    <h3><a href="/lomba/{{$lomba->id}}/{{$lomba->kategori}}">{{$lomba->kategori}}</a></h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    @endif
    <!-- top subjects End -->
  </main>
@endsection
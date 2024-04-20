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
                  <h1 data-animation="bounceIn" data-delay="0.2s">Hubungi kami</h1>
                  <!-- breadcrumb Start-->
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                      <li class="breadcrumb-item"><a href="#">Kontak</a></li>
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
    <!--?  Contact Area start  -->
    <section class="contact-section">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2 class="contact-title">Kirim pesan</h2>
          </div>
          <div class="col-lg-8">
            <form class="form-contact contact_form" action="/kirim-pesan" method="post" >
              @csrf
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan pesan'" placeholder=" Masukan pesan" required></textarea>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan nama Anda'" placeholder="Masukan nama Anda" required/>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Email Anda'" placeholder="Email" required/>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan subjek'" placeholder="Masukan subjek" required/>
                  </div>
                </div>
              </div>
              <div class="form-group mt-3">
                <button type="submit" class="button button-contactForm boxed-btn">Kirim</button>
              </div>
            </form>
          </div>
          <div class="col-lg-3 offset-lg-1">
            <div class="media contact-info">
              <span class="contact-info__icon"><i class="ti-home"></i></span>
              <div class="media-body">
                <h3>Semarang, Jawa Tengah.</h3>
                <p>Jl. Tarupolo Tengah No.7, Gisikdrono, Semarang Barat</p>
              </div>
            </div>
            <div class="media contact-info">
              <span class="contact-info__icon"><i class="ti-tablet"></i></span>
              <div class="media-body">
                <h3>024 7663 6588</h3>
                <p>07.00-15.00 (Hari Kerja)</p>
              </div>
            </div>
            <div class="media contact-info">
              <span class="contact-info__icon"><i class="ti-email"></i></span>
              <div class="media-body">
                <h3>support@bptik.com</h3>
                <p>Kirimi kami pesan kapan saja!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact Area End -->
  </main>
@endsection
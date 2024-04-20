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
                <h1 data-animation="bounceIn" data-delay="0.2s">Pendaftaran Lomba</h1>
                <!-- breadcrumb Start-->
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="cat-detail.html">Lomba</a></li>
                    <li class="breadcrumb-item"><a href="apply.html">Pendaftaran</a></li>
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
          <h3 class="mb-30">Form Pendaftaran</h3>
          <form action="/lomba/{{$lomba->id}}/{{$lomba->kategori}}/daftar" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-10">
              <input type="text" id="kelompok" name="kelompok" placeholder="Nama Kelompok" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Kelompok'" required class="single-input" />
            </div>
            <div class="mt-10">
              <input type="text" id="ketua" name="ketua" placeholder="Nama Ketua" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Ketua'" required class="single-input" />
            </div>
            <div class="row">
              <div class="col-lg-8 col-md-8">
                <div class="mt-10">
                  <input type="text" id="anggota1" name="anggota1" placeholder="Nama Anggota 1" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Anggota 1'" required class="single-input" />
                </div>
                <div class="mt-10">
                  <input type="text" id="anggota2" name="anggota2" placeholder="Nama Anggota 2" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Anggota 2'" required class="single-input" />
                </div>
                <div class="mt-10">
                  <input type="text" id="anggota3" name="anggota3" placeholder="Nama Anggota 3" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Anggota 3'" class="single-input" />
                </div>
                <div class="mt-10">
                  <input type="text" id="anggota4" name="anggota4" placeholder="Nama Anggota 4" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Anggota 4'" class="single-input" />
                </div>
              </div>
              <div class="col-lg-4 col-md-4 mt-sm-30">
                <div class="mt-10">
                  <input type="text" id="nomor1" name="nomor1" placeholder="Nomor Induk" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nomor Induk'" required class="single-input" />
                </div>
                <div class="mt-10">
                  <input type="text" id="nomor2" name="nomor2" placeholder="Nomor Induk" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nomor Induk'" required class="single-input" />
                </div>
                <div class="mt-10">
                  <input type="text" id="nomor3" name="nomor3" placeholder="Nomor Induk" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nomor Induk'" class="single-input" />
                </div>
                <div class="mt-10">
                  <input type="text" id="nomor4" name="nomor4" placeholder="Nomor Induk" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nomor Induk'" class="single-input" />
                </div>
              </div>
            </div>
            <div class="input-group-icon mt-10">
              <div class="icon"><i class="fa fa-book" aria-hidden="true"></i></div>
              <div class="form-select" id="default-select" >
                <select name="jenjang" id="jenjang">
                  <option value=" ">Jenjang</option>
                  <option value="sd">SD</option>
                  <option value="smp">SMP</option>
                  <option value="sma">SMA</option>
                </select>
              </div>
            </div>
            <div class="mt-10">
              <input type="text" id="sekolah" name="sekolah" placeholder="Asal Sekolah" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Asal Sekolah'" required class="single-input" />
            </div>
            <div class="input-group-icon mt-10">
              <div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
              <div class="form-select" id="default-select" >
                <select name="cabang" id="cabang">
                  <option value=" ">Kota</option>
                  <option value="CK1">Bangladesh</option>
                  <option value="CK2">India</option>
                  <option value="CK3">England</option>
                  <option value="CK4">Srilanka</option>
                  <option value="CK5">Zimbabwe</option>
                  <option value="CK6">Timor Leste</option>
                  <option value="CK7">Papua Merdeka</option>
                  <option value="CK8">Wakanda</option>
                  <option value="CK9">Tlogopeju</option>
                  <option value="CK10">Spain</option>
                  <option value="CK11">Nazi</option>
                  <option value="CK12">Uni Soviet</option>
                  <option value="CK13">Unisula</option>
                  <option value="CK13">Udinus</option>
                </select>
              </div>
            </div>
            <div class="mt-10">
              <input type="text" id="judul" name="judul" placeholder="Judul" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Judul'" class="single-input" />
            </div>
            <div class="mt-10">
              <textarea class="single-textarea" id="deskripsi" name="deskripsi" placeholder="Deskripsi" onfocus="this.placeholder = ''"
              onblur="this.placeholder = 'Deskripsi'" required></textarea>
            </div>
            <div class="mt-10">
              <label for="karya">Karya</label>
              <input type="file" id="karya" name="karya" required class="single-input-primary" />
            </div>
            <div class="mt-10">
              <label for="thumbnail">Thumbnail</label>
              <input type="file" id="thumbnail" name="thumbnail" required class="single-input-primary" />
            </div>
            <div class="mt-10">
              <label for="sk">Surat Kegiatan</label>
              <input type="file" id="sk" name="sk" placeholder="Surat Kegiatan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Surat Kegiatan'" required class="single-input-primary" />
            </div>
            <div class="mt-10">
              <label for="foto">File Foto (rar)</label>
              <input type="file" id="foto" name="foto" required class="single-input-primary" />
            </div>
            <div class="mt-5">
              <button type="submit" class="button button-contactForm btn_1 boxed-btn">Daftar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- Blog Area End -->
</main>
@endsection
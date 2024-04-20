@extends('admin.layout')

@section('content')
    <!-- Content -->
    <div class="container-xl flex-grow-4 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Beranda / Data Peserta /</span> Detail</h4>
      <div class="row">
        <div class="card mb-3">
          <div class="card-body">
            <section class="blog_area single-post-area section-padding">
              <div class="container">
                <div class="row">
                  <div class="single-post">
                    <div class="feature-img m-4">
                      <img class="img-fluid" src="{{asset('storage/pendaftar/thumbnail/'.$participant->thumbnail)}}" alt="ini gambar">
                    </div>
                    <div class="blog_details">
                      <h1 style="color: #2d2d2d">{{$participant->judul}}</h1>
                      <p class="blog-info-link mt-3 mb-4">
                        <a> {{$participant->created_at}}</a>
                      </p>
                      <p class="excert">
                        {{$participant->deskripsi}}
                      </p>
                    </div>
                    <div class="mt-3">
                      <button
                      type="button"
                      class="btn btn-primary"
                      data-bs-toggle="modal"
                      data-bs-target="#karyaModal"
                      >
                      Lihat Karya
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="karyaModal" tabindex="-1" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                          {{-- if file format is jpg show with img else show with iframe --}}
                          @if (pathinfo($participant->karya, PATHINFO_EXTENSION) == 'jpg' || pathinfo($participant->karya, PATHINFO_EXTENSION) == 'png' || pathinfo($participant->karya, PATHINFO_EXTENSION) == 'jpeg')
                            <img class="img-fluid" src="{{asset('storage/pendaftar/karya/'.$participant->karya)}}" alt="ini gambar">
                          @else
                            <iframe height="700" src="{{asset('storage/pendaftar/karya/'.$participant->karya)}}"></iframe>
                          @endif
                        </div>
                      </div>
                    </div>
                    {{-- make button to download beside lihat karya --}}
                    <div class="btn-group">
                      <button
                        type="button"
                        class="btn btn-outline-primary dropdown-toggle"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        Unduh File
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/karya/download/{{$participant->id}}">Karya</a></li>
                        <li><a class="dropdown-item" href="/sk/download/{{$participant->id}}">Surat Keterangan</a></li>
                        <li><a class="dropdown-item" href="/foto/download/{{$participant->id}}">Foto Kelompok</a></li>
                        <li>
                          <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="/storage/pendaftar/karya/{{$participant->karya}}"><small>Lihat karya di halaman baru</small></a></li>
                      </ul>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
      <!--/ Advance Styling Options -->
    </div>
      <!-- / Content -->
@endsection
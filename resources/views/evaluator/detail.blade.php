@extends('evaluator.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Details</h4>
      <div class="row">
        <div class="nav-align-top mb-4">
          <ul class="nav nav-pills mb-3" role="tablist">
            <li class="nav-item">
              <button
                type="button"
                class="nav-link active"
                role="tab"
                data-bs-toggle="tab"
                data-bs-target="#navs-pills-top-home"
                aria-controls="navs-pills-top-home"
                aria-selected="true"
              >
                Deskripsi
              </button>
            </li>
            <li class="nav-item">
              <button
                type="button"
                class="nav-link"
                role="tab"
                data-bs-toggle="tab"
                data-bs-target="#navs-pills-top-profile"
                aria-controls="navs-pills-top-profile"
                aria-selected="false"
              >
                Nilai
              </button>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
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
                        <li><a class="dropdown-item" href="/pendaftar/karya/{{$participant->karya}}"><small>Lihat karya di halaman baru</small></a></li>
                      </ul>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
              <div class="col-xxl">
                <div class=" d-flex align-items-center justify-content-between">
                  <form action="/penilaian/detail/{{$participant->id}}" method="POST" onsubmit="return confirm('Pastikan nilai sudah benar karena tidak dapat diubah!!')">
                    @csrf
                    <div class="row mb-3">
                    </div>
                    <div class="row mb-3">
                    </div>
                    <div class="row mb-3">
                      @foreach ($indeks as $nilai)
                      <label class="col-sm-4 col-form-label mb-3" for="" >{{$nilai}}</label>
                      <div class="col-sm-5">
                          <div class="input-group input-group-merge">
                              <input
                              type="number"
                              class="form-control"
                              id="html5-number-input"
                              name="nilai[]"
                              aria-label="Masukkan nilai"
                              {{-- if one of $participant->penilai is same with auth()->user()->name then disable --}}
                              @if (in_array(auth()->user()->name, $penilai))
                                disabled
                                placeholder="Sudah dinilai"
                              @else
                                required
                                placeholder="Masukan nilai"
                              @endif
                              />
                          </div>
                          <div class="form-text"></div>
                      </div>    
                      @endforeach
                    </div>
                    <div class="row mb-3">
                    </div>
                    <div class="row mb-3">
                    </div>
                    <div class=" justify-content-end">
                      <div class="col-sm-20">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
     <!-- / Content -->
@endsection
@extends('admin.layout')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Informasi / </span>Berita</h4>
        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
          {{session()->get('error')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif(session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
          {{session()->get('success')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row">
          <div class="col-12 mb-4 order-0">
            <div class="card mb-4">
              <div class="d-flex align-items-end row">
                <div class="col-sm-7">  
                  <div class="card-body">
                    <h5 class="card-title text-primary">Atur Jadwal Perhelatan Gelar Karya Di Sini!</h5>
                    @php
                      $itemFound = false;
                    @endphp
                    @foreach ($beritas as $berita)
                      @if($itemFound == false && $berita->judul == "Jadwal") 
                        <p class="mb-4">
                        Jadwal perhelatan telah diatur, Anda dapat merubahnya dengan informasi yang terbaru!
                        </p>
                        <button
                          class="btn btn-outline-primary me-1 mb-4"
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#collapseExample"
                          aria-expanded="false"
                          aria-controls="collapseExample"
                        >
                          Ubah Jadwal!
                        </button>
                        <div class="collapse" id="collapseExample">
                          <form action="/berita-edit/{{$berita->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                              <div class="col-sm-10">
                                <div>
                                  <textarea class="form-control" name="deskripsi" id="deskripsi" rows="20" placeholder="Masukan isi berita anda" required>{{$berita->deskripsi}}</textarea>
                                </div>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-sm-10">
                                <input class="form-control" type="file" name="gambar" id="gambar" />
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-sm-5">
                                <label class="form-label" for="tgl_pendaftaran">Pendaftaran</label>
                                <input class="form-control" type="date" name="tgl_pendaftaran" id="tgl_pendaftaran" value="{{$berita->tgl_pendaftaran}}" />
                              </div>
                              <div class="col-sm-5">
                                <label class="form-label" for="tgl_seleksi1">Seleksi 1</label>
                                <input class="form-control" type="date" name="tgl_seleksi1" id="tgl_seleksi1" value="{{$berita->tgl_seleksi1}}" />
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-sm-5">
                                <label class="form-label" for="tgl_seleksi2">Seleksi 2</label>
                                <input class="form-control" type="date" name="tgl_seleksi2" id="tgl_seleksi2" value="{{$berita->tgl_seleksi2}}" />
                              </div>
                              <div class="col-sm-5">
                                <label class="form-label" for="tgl_seleksi3">Seleksi 3</label>
                                <input class="form-control" type="date" name="tgl_seleksi3" id="tgl_seleksi3" value="{{$berita->tgl_seleksi3}}" />
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-sm-5">
                                <label class="form-label" for="tgl_seleksi4">seleksi 4</label>
                                <input class="form-control" type="date" name="tgl_seleksi4" id="tgl_seleksi4" value="{{$berita->tgl_seleksi4}}" />
                              </div>
                              <div class="col-sm-5">
                                <label class="form-label" for="tgl_pengumuman">Pengumuman</label>
                                <input class="form-control" type="date" name="tgl_pengumuman" id="tgl_pengumuman" value="{{$berita->tgl_pengumuman}}" />
                              </div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Unggah</button>
                          </form>
                        </div>
                        @php
                          $itemFound = true;
                        @endphp
                      @endif
                    @endforeach
                    @if($itemFound == false)
                      <p class="mb-4">
                      Jadwal perhelatan belum diatur!
                      </p>
                      <button
                        class="btn btn-outline-primary me-1 mb-4"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseExample"
                        aria-expanded="false"
                        aria-controls="collapseExample"
                      >
                        Atur Sekarang!
                      </button>
                      <div class="collapse" id="collapseExample">
                        <form action="/berita" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="row mb-3">
                            <div class="col-sm-10">
                              <div>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="20" placeholder="Masukan isi berita anda" required></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <div class="col-sm-10">
                              <input class="form-control" type="file" name="gambar" id="gambar" />
                            </div>
                          </div>
                          <div class="row mb-3">
                            <div class="col-sm-5">
                              <label class="form-label" for="tgl_pendaftaran">Pendaftaran</label>
                              <input class="form-control" type="date" name="tgl_pendaftaran" id="tgl_pendaftaran" required />
                            </div>
                            <div class="col-sm-5">
                              <label class="form-label" for="tgl_seleksi1">Seleksi 1</label>
                              <input class="form-control" type="date" name="tgl_seleksi1" id="tgl_seleksi1" required />
                            </div>
                          </div>
                          <div class="row mb-3">
                            <div class="col-sm-5">
                              <label class="form-label" for="tgl_seleksi2">Seleksi 2</label>
                              <input class="form-control" type="date" name="tgl_seleksi2" id="tgl_seleksi2" required />
                            </div>
                            <div class="col-sm-5">
                              <label class="form-label" for="tgl_seleksi3">Seleksi 3</label>
                              <input class="form-control" type="date" name="tgl_seleksi3" id="tgl_seleksi3" />
                            </div>
                          </div>
                          <div class="row mb-3">
                            <div class="col-sm-5">
                              <label class="form-label" for="tgl_seleksi4">seleksi 4</label>
                              <input class="form-control" type="date" name="tgl_seleksi4" id="tgl_seleksi4" />
                            </div>
                            <div class="col-sm-5">
                              <label class="form-label" for="tgl_pengumuman">Pengumuman</label>
                              <input class="form-control" type="date" name="tgl_pengumuman" id="tgl_pengumuman" required />
                            </div>
                          </div>
                          <button type="submit" class="btn btn-outline-primary">Unggah</button>
                        </form>
                      </div>
                    @endif
                  </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                  <div class="card-body pb-0 px-0 px-md-4">
                    <img
                      src="assets/img/illustrations/girl-doing-yoga-light.png"
                      height="140"
                      alt="View Badge User"
                      data-app-dark-img="illustrations/man-with-laptop-dark.png"
                      data-app-light-img="illustrations/man-with-laptop-light.png"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Borderless Table -->
        <div class="card">
          <div class="row">
            <div class="col-md-10">
              <h5 class="card-header">Data Berita</h5>
            </div>
            <div class="col-md-2 mt-3">
              <a href="/berita/tambah" class="btn btn-primary">Masukan Berita</a>
            </div>
          </div>
          <div class="table-responsive text-nowrap">
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th>Judul</th>
                  <th>Tanggal</th>
                  <th class="justify-content-end col-3">Atur</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($beritas as $berita)
                <tr>
                  <td>
                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><a href="/berita/detail/{{$berita->id}}">{{$berita->judul}}</a></strong>
                  </td>
                  <td>{{$berita->updated_at}}</td>
                  <td>
                    <div class="col-md-12">
                      <ul class="pagination justify-content-end">
                        <li class="page-item active">
                          <a class="page-link bx bx-edit-alt " href="/berita/edit/{{$berita->id}}"></a>
                        </li>
                        <li class="page-item active">
                          <form action="/berita/{{$berita->id}}" methods="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus {{$berita->judul}}?')">
                            @method('delete')
                            @csrf
                            <button class="page-link bx bx-trash " type="submit"></button>
                          </form>
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!--/ Borderless Table -->
      <!-- / Content -->
@endsection
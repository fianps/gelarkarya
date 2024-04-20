@extends('admin.layout')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Beranda / </span>Indeks Penialian</h4>
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
        <!-- Borderless Table -->
        <div class="card">
          <div class="row mb-4">
            <div class="col-md-8">
              <h5 class="card-header">Indeks Penialian</h5>
            </div>
            <div class="col-md-4">
              <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="backDropModalTitle">Input Indeks Penilaian</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/indeks-nilai" method="POST">
                      @csrf
                      <div class="modal-body">
                        <div class="row">
                          <div class="col mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select id="kategori" name="kategori" class="form-select">
                              <option>Pilih Kategori</option>
                              @foreach ($lombas as $lomba)
                                  <option value="{{$lomba->kategori}}">{{$lomba->kategori}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <label for="indeks" class="form-label">Indeks</label>
                            <input type="text" id="indeks" name="indeks[]" class="form-control" placeholder="Masukan indeks penilaian" />
                            <button type="button" class="btn btn-primary" onclick="createNewInput();">+</button>
                          </div>
                        </div>
                        <div id="newInput"></div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="demo-inline-spacing">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#backDropModal">Masukan Indeks Penilaian</button>
              </div>
            </div>
          </div>
          <div class="table-responsive text-nowrap">
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th>Kategori</th>
                  <th>Jumlah Indeks</th>
                  <th>Pembaharuan</th>
                  <th>Atur</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($customForms as $customForm)
                <tr>
                  <td>
                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$customForm->kategori}}</a></strong>
                  </td>
                  {{-- counts the number of list attributes in the index column --}}
                    <td>{{count($customForm->indeks)}}</td>
                  <td>{{$customForm->updated_at}}</td>
                  <td>
                    <form action="/indeks-nilai/{{$customForm->id}}" methods="post" onsubmit="return confirm('Yakin ingin menghapus {{$customForm->kategori}}?')">
                      @method('delete')
                      @csrf
                      <button class="dropdown-item" type="submit"><i class="bx bx-trash me-1"></i> Hapus</button>
                    </form>
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
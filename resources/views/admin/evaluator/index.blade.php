@extends('admin.layout')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Beranda / </span>Data Penilai</h4>
        <!-- Borderless Table -->
        <div class="card">
          <div class="row mb-4">
            <div class="col-md-9">
              <h5 class="card-header">Data Penilai</h5>
            </div>
            <div class="col-md-3">
              <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="backDropModalTitle">Input Data Penilai</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/data-penilai" method="POST">
                      @csrf
                      <div class="modal-body">
                        <div class="row">
                          <div class="col mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Masukan Nama" />
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                            <input type="text" id="pekerjaan" name="pekerjaan" class="form-control" placeholder="Masukan Pekerjaan" />
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Masukan Alamat" />
                          </div>
                        </div>
                        <div class="row g-2">
                          <div class="col mb-0">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" id="email" name="email" class="form-control" placeholder="xxxx@xxx.xx" />
                          </div>
                          <div class="col mb-0">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select id="kategori" name="kategori" class="form-select">
                              <option>Pilih</option>
                              @foreach ($lombas as $lomba)
                                  <option value="{{$lomba->kategori}}">{{$lomba->kategori}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="importModal" data-bs-backdrop="static" tabindex="-1">
                <div class="modal-dialog">
                  <form class="modal-content" action="/data-penilai/import" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                      <h5 class="modal-title" id="backDropModalTitle">Import File</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col mb-3">
                          <input class="form-control" type="file" id="formFile" name="file-excel" />
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="demo-inline-spacing">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModal">Import</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#backDropModal">Masukan Penilai</button>
              </div>
            </div>
          </div>
          <div class="table-responsive text-nowrap">
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Pekerjaan</th>
                  <th>Alamat</th>
                  <th>Kategori</th>
                  <th>Atur</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($evaluators as $evaluator)
                <tr>
                  <td>
                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$evaluator->name}}</a></strong>
                  </td>
                  <td>{{$evaluator->pekerjaan}}</td>
                  <td>{{$evaluator->alamat}}</td>
                  <td><span class="badge bg-label-primary me-1">{{$evaluator->kategori}}</span></td>
                  <td>
                    <form action="/data-penilai/{{$evaluator->id}}" methods="post" onsubmit="return confirm('Yakin ingin menghapus {{$evaluator->name}}?')">
                      @method('delete')
                      @csrf
                      <button class="dropdown-item" type="submit" data-bs-toggle="modal" data-bs-target="#modalDelete"><i class="bx bx-trash me-1"></i> Hapus</button>
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
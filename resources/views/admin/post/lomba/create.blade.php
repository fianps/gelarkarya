@extends('admin.layout')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Informasi / Lomba /</span> Tambah</h4>
        <div class="row">
          <div class="card mb-3">
            <div class="card-body">
              <form action="/lomba/tambah" method="POST">
                @csrf
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="kategori">kategori</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Masukan kategori" required/>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi</label>
                  <div class="col-sm-10">
                      <div>
                          <textarea class="form-control" name="deskripsi" id="deskripsi" rows="15" placeholder="Masukan deskripsi lomba" required></textarea>
                        </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="aturan">Aturan</label>
                  <div class="col-sm-10">
                      <div>
                          <textarea class="form-control" name="aturan" id="aturan" rows="15" placeholder="Masukan aturan lomba"></textarea>
                        </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="penilaian">Penilaian</label>
                  <div class="col-sm-10">
                      <div>
                          <textarea class="form-control" name="penilaian" id="penilaian" rows="15" placeholder="Masukan penilaian lomba"></textarea>
                        </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="ketentuan">Ketentuan</label>
                  <div class="col-sm-10">
                      <div>
                          <textarea class="form-control" name="ketentuan" id="ketentuan" rows="15" placeholder="Masukan ketentuan yang ada"></textarea>
                        </div>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="tanggal_akhir" class="col-md-2 col-form-label">Tanggal Berakhir</label>
                  <div class="col-md-10">
                    <input class="form-control" type="date" value="2023-01-01" name="tanggal_akhir" id="tanggal_akhir" />
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Unggah</button>
              </form>
            </div>
          </div>
        </div>
        <!--/ Advance Styling Options -->
      </div>
@endsection
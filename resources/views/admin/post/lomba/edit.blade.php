@extends('admin.layout')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Informasi / Lomba /</span> Edit</h4>
        <div class="row">
          <div class="card mb-3">
            <div class="card-body">
              <form action="/lomba/edit/{{$lomba->id}}" method="POST">
                @csrf
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="kategori">Kategori</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="kategori" id="kategori" value="{{$lomba->kategori}}" required/>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi</label>
                  <div class="col-sm-10">
                      <div>
                          <textarea class="form-control" name="deskripsi" id="deskripsi" rows="20" required>{{ $lomba->deskripsi }}</textarea>
                        </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="aturan">Aturan</label>
                  <div class="col-sm-10">
                      <div>
                          <textarea class="form-control" name="aturan" id="aturan" rows="20">{{ $lomba->aturan }}</textarea>
                        </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="penilaian">Penilaian</label>
                  <div class="col-sm-10">
                      <div>
                          <textarea class="form-control" name="penilaian" id="penilaian" rows="20">{{ $lomba->penilaian }}</textarea>
                        </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="ketentuan">Ketentuan</label>
                  <div class="col-sm-10">
                      <div>
                          <textarea class="form-control" name="ketentuan" id="ketentuan" rows="20">{{ $lomba->ketentuan }}</textarea>
                        </div>
                  </div>
                </div>
                <div class="mb-3 row">
                    <label for="tanggal_akhir" class="col-md-2 col-form-label">Tanggal Berakhir</label>
                    <div class="col-md-10">
                      <input class="form-control" type="date" value="{{$lomba->tanggal_akhir}}" name="tanggal_akhir" id="tanggal_akhir" />
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
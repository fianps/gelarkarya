@extends('admin.layout')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Informasi / Berita /</span> Edit</h4>
        <div class="row">
          <div class="card mb-3">
            <div class="card-body">
              <form action="/berita/edit/{{$berita->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="judul">Judul</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="judul" id="judul" value="{{$berita->judul}}" required/>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="deskripsi">Isi</label>
                  <div class="col-sm-10">
                      <div>
                          <textarea class="form-control" name="deskripsi" id="deskripsi" rows="20" required>{{ $berita->deskripsi }}</textarea>
                        </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="gambar">File Foto</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="gambar" id="gambar" />
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
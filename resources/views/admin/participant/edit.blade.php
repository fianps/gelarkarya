@extends('admin.layout')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Beranda / Data Peserta /</span> Edit</h4>
      <div class="row">
        <div class="card mb-3">
          <div class="card-body">
            <form action="/data-peserta/edit/{{$participant->id}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="kategori">kategori</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="kategori" id="kategori" value="{{$participant->kategori}}"/>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="kelompok">Kelompok</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="kelompok" id="kelompok" value="{{$participant->kelompok}}"/>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="ketua">Ketua</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="ketua" id="ketua" value="{{$participant->ketua}}" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="judul">Judul</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="judul" id="judul" value="{{$participant->judul}}" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="thumbnail">Thumbnail</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="thumbnail" id="thumbnail" value="{{$participant->thumbnail}}" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="karya">Karya</label>
                <div class="col-sm-10">
                  <input class="form-control" type="file" name="karya" id="karya" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi</label>
                <div class="col-sm-10">
                  <div>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="20">{{ $participant->deskripsi }}</textarea>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="anggota1">Anggota 1</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="anggota1" id="anggota1" value="{{$participant->anggota1}}"/>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="anggota2">Anggota 2</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="anggota2" id="anggota2" value="{{$participant->anggota2}}"/>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="anggota3">Anggota 3</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="anggota3" id="anggota3" value="{{$participant->anggota3}}"/>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="anggota4">Anggota 4</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="anggota4" id="anggota4" value="{{$participant->anggota4}}"/>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="nomor1">Nomor 1</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nomor1" id="nomor1" value="{{$participant->nomor1}}"/>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="nomor2">Nomor 2</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nomor2" id="nomor2" value="{{$participant->nomor2}}"/>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="nomor3">Nomor 3</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nomor3" id="nomor3" value="{{$participant->nomor3}}"/>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="nomor4">Nomor 4</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nomor4" id="nomor4" value="{{$participant->nomor4}}"/>
                </div>
              </div>
              <div class="row mb-3">
                <label for="jenjang" class="col-sm-2 col-form-label">Jenjang</label>
                <div class="col-sm-10">
                  <select class="form-select" id="jenjang" name="jenjang" aria-label="Default select example">
                    <option value="sd" @if(old('jenjang') == 'sd') {{'selected'}} @endif>SD</option>
                    <option value="smp" @if(old('jenjang') == 'smp') {{'selected'}} @endif>SMP</option>
                    <option value="sma" @if(old('jenjang') == 'sma') {{'selected'}} @endif>SMA</option>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="sekolah">Sekolah</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="sekolah" id="sekolah" value="{{$participant->sekolah}}"/>
                </div>
              </div>
              <div class="row mb-3">
                <label for="cabang" class="col-sm-2 col-form-label">Kota</label>
                <div class="col-sm-10">
                  <select class="form-select" id="cabang" name="cabang" aria-label="Default select example">
                    <option value="CK1" @if(old('cabang') == 'CK1') {{'selected'}} @endif>Bangladesh</option>
                    <option value="CK2" @if(old('cabang') == 'CK2') {{'selected'}} @endif>India</option>
                    <option value="CK3" @if(old('cabang') == 'CK3') {{'selected'}} @endif>England</option>
                    <option value="CK4" @if(old('cabang') == 'CK4') {{'selected'}} @endif>Srilanka</option>
                    <option value="CK5" @if(old('cabang') == 'CK5') {{'selected'}} @endif>Zimbabwe</option>
                    <option value="CK6" @if(old('cabang') == 'CK6') {{'selected'}} @endif>Timor Leste</option>
                    <option value="CK7" @if(old('cabang') == 'CK7') {{'selected'}} @endif>Papua Merdeka</option>
                    <option value="CK8" @if(old('cabang') == 'CK8') {{'selected'}} @endif>Wakanda</option>
                    <option value="CK9" @if(old('cabang') == 'CK9') {{'selected'}} @endif>Tlogopeju</option>
                    <option value="CK10" @if(old('cabang') == 'CK10') {{'selected'}} @endif>Spain</option>
                    <option value="CK11" @if(old('cabang') == 'CK11') {{'selected'}} @endif>Nazi</option>
                    <option value="CK12" @if(old('cabang') == 'CK12') {{'selected'}} @endif>Uni Soviet</option>
                    <option value="CK13" @if(old('cabang') == 'CK13') {{'selected'}} @endif>Unisula</option>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="sk">Surat Keterangan</label>
                <div class="col-sm-10">
                  <input class="form-control" type="file" name="sk" id="sk" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="foto">Foto</label>
                <div class="col-sm-10">
                  <input class="form-control" type="file" name="foto" id="foto" />
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
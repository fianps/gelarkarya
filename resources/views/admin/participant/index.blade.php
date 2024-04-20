@extends('admin.layout')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Beranda / </span>Data Peserta</h4>
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
          <h5 class="card-header">Data Pendaftaran Peserta</h5>
          <div class="table-responsive text-nowrap">
            <table class="table table-borderless mb-1">
              <thead>
                <tr>
                  <th>Kelompok</th>
                  <th>Ketua</th>
                  <th>Jenjang</th>
                  <th>Kategori</th>
                  <th>Karya</th>
                  <th>Atur</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($participants as $participant)
                <tr>
                  <td>
                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><a href="/data-peserta/detail/{{$participant->id}}">{{$participant->kelompok}}</a></strong>
                  </td>
                  <td>{{$participant->ketua}}</td>
                  <td>{{$participant->jenjang}}</td>
                  <td>{{$participant->kategori}}</td>
                  <td><span class="badge bg-label-primary me-1">{{$participant->judul}}</span></td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="/data-peserta/edit/{{$participant->id}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <form action="/data-peserta/{{$participant->id}}" methods="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus {{$participant->kelompok}}?')">
                          <button class="dropdown-item" type="submit"><i class="bx bx-trash me-1"></i> Hapus</button>
                        </form>
                      </div>
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
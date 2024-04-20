@extends('evaluator.layout')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Beranda / </span>Peserta</h4>
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
                    <h5 class="card-title text-primary">Selamat Datang {{auth()->user()->name}}! 🎉</h5>
                    <p class="mb-4">
                    Semoga harimu menyenangkan! <br>
                    perhatikan proses penilaian karena hanya bisa dilakukan sekali.
                    </p>
                  </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                  <div class="card-body pb-0 px-0 px-md-4">
                    <img
                      src="assets/img/illustrations/man-with-laptop-light.png"
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
          <h5 class="card-header">Data Penilaian Peserta</h5>
          <div class="table-responsive text-nowrap">
            <table class="table table-borderless mb-4">
              <thead>
                <tr>
                  <th>Kelompok</th>
                  <th>Ketua</th>
                  <th>Jenjang</th>
                  <th>Karya</th>
                  <th>Nilai</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($participants as $participant)
                <tr>
                  <td>
                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><a href="/penilaian/detail/{{$participant->id}}">{{$participant->kelompok}}</a></strong>
                  </td>
                  <td>{{$participant->ketua}}</td>
                  <td>{{$participant->jenjang}}</td>
                  <td><span class="badge bg-label-primary me-1">{{$participant->judul}}</span></td>
                    @if($participant->penilai == null)
                      <td><span class="badge bg-label-warning me-1">Belum Dinilai</span></td>
                    @else
                      {{-- seperate the value of penilai --}}
                      @php
                        $penilai = explode(", ", $participant->penilai);
                      @endphp
                      @if(in_array(Auth::user()->name, $penilai))
                        <td><span class="badge bg-label-success me-1">Sudah Dinilai</span></td>
                      @else
                        <td><span class="badge bg-label-warning me-1">Belum Dinilai</span></td>
                      @endif
                    @endif
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
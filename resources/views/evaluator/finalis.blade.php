@extends('evaluator.layout')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Beranda / </span>Finalis</h4>
        <!-- Borderless Table -->
        <div class="card">
          <h5 class="card-header">Data Finalis</h5>
          <div class="table-responsive text-nowrap">
            <table class="table table-borderless mb-4">
              <thead>
                <tr>
                  <th>Kelompok</th>
                  <th>Ketua</th>
                  <th>Jenjang</th>
                  <th>Karya</th>
                  <th>Nilai Keseluruhan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($finalists as $finalist)
                <tr>
                  <td>
                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><a href="/penilaian/detail/{{$finalist->id}}">{{$finalist->kelompok}}</a></strong>
                  </td>
                  <td>{{$finalist->ketua}}</td>
                  <td>{{$finalist->jenjang}}</td>
                  <td><span class="badge bg-label-primary me-1">{{$finalist->judul}}</span></td>
                  @if ($finalist->nilai == null)
                  <td><span class="badge bg-label-warning me-1">Belum Dinilai</span></td>
                  @else
                  <td><span class="badge bg-label-danger me-1">{{$finalist->nilai}}</span></td>
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
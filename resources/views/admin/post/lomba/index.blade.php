@extends('admin.layout')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Informasi / </span>Lomba</h4>
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
          <div class="row">
            <div class="col-md-10">
              <h5 class="card-header">Data Lomba</h5>
            </div>
            <div class="col-md-2 mt-3">
              <a href="/lomba/tambah" class="btn btn-primary">Masukan Lomba</a>
            </div>
          </div>
          <div class="table-responsive text-nowrap">
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th>Kategori</th>
                  <th>Tanggal Dibuat</th>
                  <th>Tanggal Berakhir</th>
                  <th class="justify-content-end col-3">Atur</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($lombas as $lomba)
                <tr>
                  <td>
                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><a href="/lomba/detail/{{$lomba->id}}">{{$lomba->kategori}}</a></strong>
                  </td>
                  <td>{{$lomba->updated_at}}</td>
                  <td>{{$lomba->tanggal_akhir}}</td>
                  <td>
                    <div class="col-md-12">
                      <ul class="pagination justify-content-end">
                        <li class="page-item active">
                          <a class="page-link bx bx-edit-alt " href="/lomba/edit/{{$lomba->id}}"></a>
                        </li>
                        <li class="page-item active">
                          <form action="/lomba/{{$lomba->id}}" methods="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus {{$lomba->kategori}}?')">
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
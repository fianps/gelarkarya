@extends('admin.layout')

@section('content')
    <!-- Content -->
    <div class="container-xl flex-grow-4 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Informasi / Lomba /</span> Detail</h4>
        <div class="row">
          <div class="card mb-3">
            <div class="card-body">
              <section class="blog_area single-post-area section-padding">
                  <div class="container">
                    <div class="row">
                      <div class="single-post">
                        <div class="blog_details">
                          <h1 style="color: #2d2d2d">{{$lomba->kategori}}</h1>
                          <p class="blog-info-link mt-3 mb-4">
                              <a>Batas Waktu | {{$lomba->tanggal_akhir}}</a>
                          </p>
                          <p class="excert">
                            {{$lomba->deskripsi}}
                          </p>
                          <h3 style="color: #2d2d2d">Aturan Perlombaan</h3>
                          <p>{{$lomba->aturan}}</p>
                          <h3 style="color: #2d2d2d">Penilaian Lomba</h3>
                          <p>{{$lomba->penilaian}}</p>
                          <h3 style="color: #2d2d2d">Ketentuan Khusus</h3>
                          <p>{{$lomba->ketentuan}}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              <a href="/lomba/edit/{{$lomba->id}}" class="btn btn-primary">Edit</a>
            </div>
          </div>
        </div>
        <!--/ Advance Styling Options -->
      </div>
      <!-- / Content -->
@endsection
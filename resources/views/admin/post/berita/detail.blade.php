@extends('admin.layout')

@section('content')
    <!-- Content -->
    <div class="container-xl flex-grow-4 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Informasi / Berita /</span> Detail</h4>
        <div class="row">
          <div class="card mb-3">
            <div class="card-body">
              <section class="blog_area single-post-area section-padding">
                  <div class="container">
                    <div class="row">
                      <div class="single-post">
                        <div class="feature-img m-4">
                          <img class="img-fluid" src="{{asset('storage/berita/'.$berita->gambar)}}" alt="ini gambar">
                        </div>
                        <div class="blog_details">
                          <h1 style="color: #2d2d2d">{{$berita->judul}}</h1>
                          <p class="blog-info-link mt-3 mb-4">
                              <a> {{$berita->created_at}}</a>
                          </p>
                          <p class="excert">
                            {{$berita->deskripsi}}
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              <a href="/berita/edit/{{$berita->id}}" class="btn btn-primary">Edit</a>
            </div>
          </div>
        </div>
        <!--/ Advance Styling Options -->
      </div>
      <!-- / Content -->
@endsection
@extends('auth.layout')

@section('container')
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
          <div class="authentication-inner">
            <!-- Register Card -->
            <div class="card">
              <div class="card-body">
                <!-- Logo -->
                <div class="app-brand justify-content-center">
                  <a href="/" class="app-brand-link gap-2">
                    <img src="{{asset('assets/img/logo/loder.png')}}" alt="" style="width: 60px" />
                    <span class="app-brand-text demo text-body fw-bolder">Gelar Karya</span>
                  </a>
                </div>
                <!-- /Logo -->
                <h4 class="mb-2">Petualangan dimulai dari sini 🚀</h4>
                <p class="mb-4">Berkompetisilah dengan bahagia!</p>
  
                <!-- Register -->
                <form id="formAuthentication" class="mb-3" action="/register" method="POST">
                    @csrf
                  <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input
                      type="text"
                      class="form-control"
                      id="name"
                      name="name"
                      placeholder="Masukan nama Anda"
                      autofocus
                    />
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukan email Anda" />
                  </div>
                  <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group input-group-merge">
                      <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password"
                      />
                      <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                  </div>
  
                  {{-- <div class="mb-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                      <label class="form-check-label" for="terms-conditions">
                        I agree to
                        <a href="javascript:void(0);">privacy policy & terms</a>
                      </label>
                    </div>
                  </div> --}}
                  <button type="submit" class="btn btn-primary d-grid w-100">Daftar</button>
                </form>
  
                <p class="text-center">
                  <span>Sudah punya akun??</span>
                  <a href="/login">
                    <span>Masuk disini!</span>
                  </a>
                </p>
              </div>
            </div>
            <!-- Register Card -->
          </div>
        </div>
      </div>
      <!-- / Content -->
@endsection
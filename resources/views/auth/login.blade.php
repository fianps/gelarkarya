@extends('auth.layout')

@section('container')
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
          <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
              <div class="card-body">
                <!-- Logo -->
                <div class="app-brand justify-content-center">
                  <a href="/" class="app-brand-link gap-2">
                    <img src="{{asset('assets/img/logo/loder.png')}}" alt="" style="width: 60px" />
                    <span class="app-brand-text demo text-body fw-bolder">gelar karya</span>
                  </a>
                </div>
                <!-- /Logo -->
                <h4 class="mb-2">Selamat Datang Kembali!</h4>
                <p class="mb-4">Untuk tetap terhubung dengan kami, silahkan masuk dengan akun anda</p>
  
                <form class="mb-3" action="/login" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                      type="email"
                      class="form-control"
                      id="email"
                      name="email"
                      placeholder="Enter your email or username"
                      autofocus
                    />
                  </div>
                  <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                      <label class="form-label" for="password">Password</label>
                      <a href="/forgot-password">
                        <small>Lupa Password?</small>
                      </a>
                    </div>
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
                  <div class="mb-3">
                    <button class="btn btn-primary d-grid w-100" type="submit">Masuk</button>
                  </div>
                </form>
                <p class="text-center">
                  <span>Belum pernah mendaftar?</span>
                  <a href="/register">
                    <span>Daftar di sini</span>
                  </a>
                </p>
              </div>
            </div>
            <!-- /Register -->
          </div>
        </div>
      </div>
      <!-- / Content -->
@endsection
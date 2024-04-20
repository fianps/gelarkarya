@extends('auth.layout')

@section('container')
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
          <div class="authentication-inner py-4">
            <!-- Forgot Password -->
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
                <h4 class="mb-2">Lupa Password? 🔒</h4>
                <p class="mb-4">Masukkan email Anda dan kami akan mengirimkan instruksi untuk mengatur ulang password Anda</p>
                <form id="formAuthentication" class="mb-3" action="/forgot-password" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                      type="text"
                      class="form-control"
                      id="email"
                      name="email"
                      placeholder="Masukan email Anda"
                      autofocus
                    />
                  </div>
                  <button class="btn btn-primary d-grid w-100">Kirim Link Reset</button>
                </form>
                <div class="text-center">
                  <a href="/login" class="d-flex align-items-center justify-content-center">
                    <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                    Kembali ke login
                  </a>
                </div>
              </div>
            </div>
            <!-- /Forgot Password -->
          </div>
        </div>
      </div>
  
      <!-- / Content -->
@endsection
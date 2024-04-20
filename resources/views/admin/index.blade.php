@extends('admin.layout')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row">
            <div class="col-12 mb-4 order-0">
              <div class="card mb-4">
                <div class="d-flex align-items-end row">
                  <div class="col-sm-7">  
                    <div class="card-body">
                      <h5 class="card-title text-primary">Selamat Datang {{auth()->user()->name}}! 🎉</h5>
                      <p class="mb-4">
                      Semoga harimu menyenangkan!
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
            <div class="col-lg-4 col-md-4 order-1">
              <div class="card">
              </div>
            </div>
            <!-- Total Revenue -->
            <div class="col-12 mb-4 order-0">
              <div class="card">
                <div class="row row-bordered g-0">
                  <div class="col-md-12">
                    <h5 class="card-header m-0 me-2 pb-3">Jumlah Peserta Kantor Cabang</h5>
                    <div id="cabangChart" class="px-2"></div>
                  </div>
                </div>
              </div>
            </div>
            <!--/ Total Revenue -->
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Cabang', 'Total'],
                  @foreach ($cabangs as $cabang)
                  ['{{$cabang->cabang}}', {{$cabang->total}}],
                  @endforeach
                ]);
                var options = {
                  is3D: true,
                };
                var chart = new google.visualization.LineChart(document.getElementById('cabangChart'));
                chart.draw(data, options);
              }
            </script>
            <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
              <div class="">
            </div>
          </div>
          <div class="row">
               
            <!-- Order Statistics -->
            <div class="col-12 col-md-order-0 mb-4">
              <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                  <div class="card-title mb-0">
                    <h5 class="m-0 me-2">Jumlah Kategori</h5>
                    <small class="text-muted">{{count($participants)}} Pendaftar</small>
                  </div>
                </div>
                <ul class="p-0 m-0">
                    @foreach ($kategoris as $kategori)   
                    <li class="d-flex mb-4 pb-1">
                      <div class="card-body">
                          <h6 class="mb-0">{{$kategori->kategori}}</h6>
                          <div class="demo-vertical-spacing">
                            <div class="progress">
                              <div
                                class="progress-bar"
                                role="progressbar"
                                style="width: {{$kategori->total/$kategoris->max('total')*100}}%"
                                aria-valuenow="{{$kategori->total}}"
                                aria-valuemin="0"
                                aria-valuemax="{{$kategoris->max('total')}}"
                              >
                                {{$kategori->total}}
                              </div>
                            </div>
                          </div>
                        </div>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
            <!--/ Order Statistics -->
            <!-- Expense Overview -->
            <div class="col-md-6 col-lg-4 order-1 mb-4">
              <div class="card">
              </div>
            </div>
            <!--/ Expense Overview -->
            <!-- Transactions -->
            <div class="col-md-6 col-lg-4 order-2 mb-4">
              <div class="card">
              </div>
            </div>
            <!--/ Transactions -->
          </div>
        </div>
        <!-- / Content -->
    </div>
@endsection
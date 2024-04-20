@extends('landing.layout')

@section('container')
<main>
    <!--? slider Area Start-->
    <section class="slider-area slider-area2">
      <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height2">
          <div class="container">
            <div class="row">
              <div class="col-xl-8 col-lg-11 col-md-12">
                <div class="hero__caption hero__caption2">
                  <h1 data-animation="bounceIn" data-delay="0.2s">Hasil Lomba</h1>
                  <!-- breadcrumb Start-->
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
                      <li class="breadcrumb-item"><a href="hasil-lomba.html">Hasil Lomba</a></li>
                    </ol>
                  </nav>
                  <!-- breadcrumb End -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="sample-text-area">
      <div class="container">
        <h3 class="mb-30">Hasil Perolehan Peringkat Gelar Karya</h3>
        <div class="default-select id=default-select">
          <select name="kategori" id="kategori">
            <option value=" ">Kategori</option>
            @foreach($kategori as $item)
                <option value="{{ $item->kategori }}">{{ $item->kategori }}</option>
            @endforeach
          </select>
        </div>
        <div class="progress-table-wrap">
          <div class="progress-table" name="progress-table" id="progress-table">
            <div class="table-head">
              <div class="serial">Peringkat</div>
              <div class="country">Karya</div>
              <div class="percentage">Sekolah</div>
              <div class="visit">Total Nilai</div>
            </div>
            <div name="table-container" id="table-container">
              @php
                $peringkat = 0;
              @endphp
              @for($i = 0; $i < count($participants); $i++)
                @if($participants[$i]->nilai == null)
                  @continue
                @endif
                @php
                  $peringkat++;
                @endphp
              <div class="table-row" name="table-row" id="table-row">
                <div class="serial">{{$peringkat}}</div>
                <div class="country"><img src="{{('storage/pendaftar/thumbnail/'.$participants[$i]->thumbnail)}}" style="height: 30px" alt="flag" />{{$participants[$i]->judul}}</div>
                <div class="percentage">{{$participants[$i]->sekolah}}</div>
                <div class="visit">{{$participants[$i]->nilai}}</div>
              </div>
              @endfor
            </div>
          </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
          $(document).ready(function(){
            $('#kategori').change(function(){
              var kategori = $(this).val();
              $.ajax({
                url: '/hasil-lomba/' + kategori,
                method: "GET",
                data: {kategori: kategori},
                success: function(result){
                  // sort by the highest nilai
                  result.sort(function(a, b) {
                    return b.nilai - a.nilai;
                  });
                  if (result) {
                    var html = '';
                    var peringkat = 0;
                    for (var i = 0; i < result.length; i++) {
                      if (result[i].nilai == null) {
                        continue;
                      }
                      peringkat++;
                      html += '<div class="table-row">';
                      html += '<div class="serial">'+peringkat+'</div>';
                      html += '<div class="country"><img src="{{asset("storage/pendaftar/thumbnail/")}}/'+result[i].thumbnail+'" style="height: 30px" alt="flag" />'+result[i].judul+'</div>';
                      html += '<div class="percentage">'+result[i].sekolah+'</div>';
                      html += '<div class="visit">'+result[i].nilai+'</div>';
                      html += '</div>';
                      if (peringkat == 10) {
                        break;
                      }
                    }
                    $('#table-container').html(html);
                  }
                }
              });
            });
          });
        </script>
      </div>
    </section>
  </main>
@endsection
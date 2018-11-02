@extends("mahasiswa.layout")

@section("content")
<body class="index-page sidebar-collapse" style="background-color: #EDEDEE ">
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg bg-primary fixed-top ">
		<div class="container">
			<div class="navbar-translate">
				{{-- <a class="navbar-brand" href="{{ url("/logout") }}" rel="tooltip" title="Self-service Fakultas Sastra" data-placement="bottom">


				</a>
             --}}
             {{-- <span style="text-align: left">Durasi Layanan : 03 Menit</span> --}}

             <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-bar bar1"></span>
                 <span class="navbar-toggler-bar bar2"></span>
                 <span class="navbar-toggler-bar bar3"></span>
             </button>
         </div>
         <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="{{ asset("img/blurred-image-1.jpg") }} ">
            <p style="color:white">Jam Pelayanan 07.00 s/d 14.00 (Permohonan di atas pukul 14.00 akan diproses hari berikutnya)</p> 
            <ul class="navbar-nav">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)" onclick="scrollToDownload()">
                            <i class="now-ui-icons arrows-1_cloud-download-93"></i>
                            <p>Download</p>
                        </a>
                    </li> -->
                    <li class="nav-item dropdown">
                    	<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                    		<i class="now-ui-icons users_single-02"></i>
                    		<p>{{ Auth::guard("mahasiswa")->user()->nama }}</p>
                    	</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="" class="dropdown-item">Ganti Password</a>
                            <a href="" class="dropdown-item" data-toggle="modal" data-target="#myModal1">Info</a>
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="dropdown-item text-danger">
                            <i class="now-ui-icons media-1_button-power"></i>
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('mahasiswa.logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="wrapper">
        <!-- <div class="page-header clear-filter" filter-color="orange">
            <div class="page-header-image" data-parallax="true" style="background-image: url('./assets/img/header.jpg');">
            </div>
            <div class="container">
            </div>
        </div> -->
        <div class="main">



        	<!-- End .section-navbars  -->
        	<div class="section section-tabs" style="min-height: 100%;padding-top: 100px">
        		<div class="container">
        			<div class="row">
        				<div class="col-md-3 col-lg-3 col-xl-3">
        					<!-- Nav tabs -->
        					<div class="card">
        						<div class="header text-center">
        							<h4 class="title title-up">Aktif Kuliah</h4>

        						</div>

        						<div class="card-body">
        							<!-- Tab panes -->
        							<div class="tab-content">
        								<div class="tab-pane active" id="home" role="tabpanel">
        									<h1 class=" text-center"><i class="now-ui-icons education_hat"></i></h1>
        									<p><button data-toggle="modal" data-target="#aktif_kuliah" class="btn btn-primary">Proses</button></p>
        								</div>
        							</div>
        						</div>
        					</div>
        				</div>
        				<div class="col-md-3 col-lg-3 col-xl-3">
                            <!-- Nav tabs -->
                            <div class="card">
                                <div class="header text-center">
                                    <h4 class="title title-up">Ijin Penelitian</h4>

                                </div>

                                <div class="card-body">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home" role="tabpanel">
                                            <h1 class=" text-center"><i class="now-ui-icons business_chart-bar-32"></i></h1>
                                            <p><button data-toggle="modal" data-target="#ijin_penelitian" class="btn btn-primary">Proses</button></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-lg-3 col-xl-3">
        					<!-- Nav tabs -->
        					<div class="card">
        						<div class="header text-center">
        							<h4 class="title title-up">Ijin Observasi</h4>

        						</div>

        						<div class="card-body">
        							<!-- Tab panes -->
        							<div class="tab-content">
        								<div class="tab-pane active" id="home" role="tabpanel">
        									<h1 class=" text-center"><i class="now-ui-icons business_chart-bar-32"></i></h1>
        									<p><button data-toggle="modal" data-target="#ijin_observasi" class="btn btn-primary">Proses</button></p>
        								</div>
        							</div>
        						</div>
        					</div>
        				</div>

                        <div class="col-md-3 col-lg-3 col-xl-3">
                            <!-- Nav tabs -->
                            <div class="card">
                                <div class="header text-center">
                                    <h4 class="title title-up">Judul Skripsi</h4>

                                </div>

                                <div class="card-body">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home" role="tabpanel">
                                            <h1 class=" text-center"><i class="now-ui-icons files_single-copy-04"></i></h1>
                                            <p><button data-toggle="modal" data-target="#judul_skripsi" class="btn btn-primary">Proses</button></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-lg-3 col-xl-3">
                            <!-- Nav tabs -->
                            <div class="card">
                                <div class="header text-center">
                                    <h4 class="title title-up">Ujian Skripsi</h4>

                                </div>

                                <div class="card-body">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home" role="tabpanel">
                                            <h1 class=" text-center"><i class="now-ui-icons education_hat"></i></h1>
                                            <!-- <p><button disabled="" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Belum Tersedia</button></p> -->
                                            <p><button data-toggle="modal" data-target="#ujian_skripsi" class="btn btn-primary">Proses</button></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

        				<div class="col-md-3 col-lg-3 col-xl-3">
                            <!-- Nav tabs -->
                            <div class="card">
                                <div class="header text-center">
                                    <h4 class="title title-up">Aspirasi</h4>

                                </div>

                                <div class="card-body">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home" role="tabpanel">
                                            <h1 class=" text-center"><i class="now-ui-icons ui-2_chat-round"></i></h1>
                                            <p><button data-toggle="modal" data-target="#keluhan" class="btn btn-primary">Proses</button></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                        {{-- <div class="col-md-3 col-lg-3 col-xl-3">
                            <!-- Nav tabs -->
                            <div class="card">
                                <div class="header text-center">
                                    <h4 class="title title-up">Dosen Pembimbing</h4>

                                </div>

                                <div class="card-body">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home" role="tabpanel">
                                            <h1 class=" text-center"><i class="now-ui-icons users_circle-08"></i></h1>
                                            <p><button disabled="" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Proses</button></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        



                        {{-- <div class="col-md-3 col-lg-3 col-xl-3">
                            <!-- Nav tabs -->
                            <div class="card">
                                <div class="header text-center">
                                    <h4 class="title title-up">Penjajakan</h4>

                                </div>

                                <div class="card-body">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home" role="tabpanel">
                                            <h1 class=" text-center"><i class="now-ui-icons education_hat"></i></h1>
                                            <!-- <p><button disabled="" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Belum Tersedia</button></p> -->
                                            <p><button disabled="" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Proses</button></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="col-md-3 col-lg-3 col-xl-3">
                            <!-- Nav tabs -->
                            <div class="card">
                                <div class="header text-center">
                                    <h4 class="title title-up">Cuti Kuliah</h4>

                                </div>

                                <div class="card-body">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home" role="tabpanel">
                                            <h1 class=" text-center"><i class="now-ui-icons education_hat"></i></h1>
                                            <!-- <p><button disabled="" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Belum Tersedia</button></p> -->
                                            <p><button disabled="" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Proses</button></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="col-md-3 col-lg-3 col-xl-3">
                            <!-- Nav tabs -->
                            <div class="card">
                                <div class="header text-center">
                                    <h4 class="title title-up">Peminjaman Barang</h4>

                                </div>

                                <div class="card-body">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home" role="tabpanel">
                                            <h1 class=" text-center"><i class="now-ui-icons design_app"></i></h1>
                                            <!-- <p><button disabled="" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Segera hadir..</button></p> -->
                                            <p><button disabled="" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Proses</button></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="col-md-3 col-lg-3 col-xl-3">
                            <!-- Nav tabs -->
                            <div class="card">
                                <div class="header text-center">
                                    <h4 class="title title-up">Peminjaman Gedung</h4>

                                </div>

                                <div class="card-body">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home" role="tabpanel">
                                            <h1 class=" text-center"><i class="now-ui-icons business_bank"></i></h1>
                                            <!-- <p><button disabled="" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Segera hadir..</button></p> -->
                                            <p><button disabled="" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Proses</button></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}




                    </div>
                </div>
            </div>
            <!-- End Section Tabs -->


            <!--  end notifications -->
            <!-- Typography -->
        </div>
        <!-- Sart Modal -->

        <!--  End Modal -->
        <!-- <footer class="footer" data-background-color="black">
            <div class="container">
                <nav>
                    <ul>
                        <li>
                            <a href="https://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://presentation.creative-tim.com">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/creativetimofficial/now-ui-kit/blob/master/LICENSE.md">
                                MIT License
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, Designed by
                    <a href="http://www.invisionapp.com" target="_blank">Invision</a>. Coded by
                    <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
                </div>
            </div>
        </footer> -->
    </div>
</body>
@endsection

@push("modal")

@component('mahasiswa.component.modal')

@slot("id")
ijin_penelitian
@endslot

@slot("title")
Surat Ijin Penelitian
@endslot

@slot('form_field')
<form action="{{ url("/permohonan-surat") }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="kode_layanan" value='ijin-penelitian'>
    <input type="hidden" name="layanan_surat_id" value='{{ $id_layanan_surat['ijin-penelitian'] }}'>

    <div class="form-row">
      <div class="form-group col-md-9">
          <label for="inputPassword4">Mata Kuliah</label>
          <input type="text" class="form-control" name="matakuliah" id="" required="" placeholder="Matakuliah">
      </div>
      <!-- <div class="form-group col-md-4">
          <label for="inputPassword4">Dosen Pengampu</label>
          <select name="dosen" id="" class="form-control" required="" >
            {{-- @foreach($dosen as $data_dosen)
                <option value="{{ $data_dosen->id }}"> {{ $data_dosen->nama }} </option>
            @endforeach --}}
        </select>
          </div> -->
    <div class="form-group col-md-3">
      <label for="inputEmail4">Tahun Akademik</label>
      <select name="tahun_ajar" id="" class="form-control" required="" >
          <option value="20182">Genap 2018/2019</option>
          <option value="20181">Gasal 2018/2019</option>
          <option value="20172">Genap 2017/2018</option>
          <option value="20171">Gasal 2017/2018</option>
          <option value="20162">Genap 2016/2017</option>
          <option value="20161">Gasal 2016/2017</option>
      </select>
  </div>
</div>

<div class="form-group">
  <label for="inputPassword4">Nama Instansi</label>
  <input type="text" class="form-control" name="nama_instansi" id=""  required=""  placeholder="Instansi">
</div>
<div class="form-group">
  <label for="inputPassword4">Alamat Instansi</label>
  <textarea name="alamat_instansi" id="" cols="30"  required=""  rows="1" class="form-control"></textarea>
</div>
<div class="form-group">
    <label for="">Judul Penelitian</label>
    <textarea name="judul_penelitian" id=""  required=""  cols="30" rows="1" class="form-control"></textarea>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="">Populasi</label>
        <input type="text" class="form-control"  required=""  name="populasi" placeholder="Populasi penelitian">
    </div>
    <div class="form-group col-md-6">
        <label for="">Tempat</label>
        <input type="text" class="form-control"  required=""  name="tempat" placeholder="Tempat penelitian">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="">Tanggal Mulai</label>
        <input type="date" class="form-control"  required=""  name="tanggal_mulai" placeholder="">
    </div>
    <div class="form-group col-md-6">
        <label for="">Tanggal Selesai</label>
        <input type="date" class="form-control"  required=""  name="tanggal_selesai" placeholder="">
    </div>
</div>
<p class="help-block">Surat dapat dikonfirmasi di Admin Fakultas.</p>
<button type="submit" class="btn btn-success pull-right">Proses</button>
</form>
@endslot

@endcomponent

@component('mahasiswa.component.modal')

@slot("id")
ijin_observasi
@endslot

@slot("title")
Surat Ijin observasi
@endslot

@slot('form_field')
<form action="{{ url("/permohonan-surat") }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="kode_layanan" value='ijin-observasi'>
    <input type="hidden" name="layanan_surat_id" value='{{ $id_layanan_surat['ijin-observasi'] }}'>

    <div class="form-row">
      <div class="form-group col-md-9">
          <label for="inputPassword4">Mata Kuliah</label>
          <input type="text" class="form-control" name="matakuliah" id="" required="" placeholder="Matakuliah">
      </div>
      <!-- <div class="form-group col-md-4">
          <label for="inputPassword4">Dosen Pengampu</label>
          <select name="dosen" id="" class="form-control" required="" >
            {{-- @foreach($dosen as $data_dosen)
                <option value="{{ $data_dosen->id }}"> {{ $data_dosen->nama }} </option>
            @endforeach --}}
        </select>
          </div> -->
    <div class="form-group col-md-3">
      <label for="inputEmail4">Tahun Akademik</label>
      <select name="tahun_ajar" id="" class="form-control" required="" >
          <option value="20182">Genap 2018/2019</option>
          <option value="20181">Gasal 2018/2019</option>
          <option value="20172">Genap 2017/2018</option>
          <option value="20171">Gasal 2017/2018</option>
          <option value="20162">Genap 2016/2017</option>
          <option value="20161">Gasal 2016/2017</option>
      </select>
  </div>
</div>

<div class="form-group">
  <label for="inputPassword4">Nama Instansi</label>
  <input type="text" class="form-control" name="nama_instansi" id=""  required=""  placeholder="Instansi">
</div>
<div class="form-group">
  <label for="inputPassword4">Alamat Instansi</label>
  <textarea name="alamat_instansi" id="" cols="30"  required=""  rows="1" class="form-control"></textarea>
</div>
<div class="form-group">
    <label for="">Judul Penelitian</label>
    <textarea name="judul_penelitian" id=""  required=""  cols="30" rows="1" class="form-control"></textarea>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="">Populasi</label>
        <input type="text" class="form-control"  required=""  name="populasi" placeholder="Populasi penelitian">
    </div>
    <div class="form-group col-md-6">
        <label for="">Tempat</label>
        <input type="text" class="form-control"  required=""  name="tempat" placeholder="Tempat penelitian">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="">Tanggal Mulai</label>
        <input type="date" class="form-control"  required=""  name="tanggal_mulai" placeholder="">
    </div>
    <div class="form-group col-md-6">
        <label for="">Tanggal Selesai</label>
        <input type="date" class="form-control"  required=""  name="tanggal_selesai" placeholder="">
    </div>
</div>
<p class="help-block">Surat dapat dikonfirmasi di Admin Fakultas.</p>
<button type="submit" class="btn btn-success pull-right">Proses</button>
</form>
@endslot

@endcomponent

@component('mahasiswa.component.modal')

@slot("id")
judul_skripsi
@endslot

@slot("title")
Pengajuan Judul Skripsi
@endslot

@slot('form_field')
<form action="{{ url("/permohonan-surat") }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="kode_layanan" value='pengajuan-skripsi'>
    <input type="hidden" name="layanan_surat_id" value='{{ $id_layanan_surat['pengajuan-skripsi'] }}'>
    <div class="form-group">
      <label for="inputPassword4">Judul Skripsi Pertama</label>
      <textarea name="judul_skripsi[]" id="" cols="30" rows="2" class="form-control"></textarea>
    </div>
    <div class="form-group">
      <label for="inputPassword4">Judul Skripsi Kedua</label>
      <textarea name="judul_skripsi[]" id="" cols="30" rows="2" class="form-control"></textarea>
    </div>
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="">Dosen Pembimbing 1</label>
        <select name="dosen_pembimbing[]" id="" class="form-control">
            @foreach($dosen as $data_dosen)
                <option value="{{ $data_dosen->id }}"> {{ $data_dosen->nama }} </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="">Dosen Pembimbing 2</label>
        <select name="dosen_pembimbing[]" id="" class="form-control">
            @foreach($dosen as $data_dosen)
                <option value="{{ $data_dosen->id }}"> {{ $data_dosen->nama }} </option>
            @endforeach
        </select>
    </div>
</div>

<p class="help-block">Surat dapat diambil di Kajur.</p>
<button type="submit" class="btn btn-success pull-right">Proses</button>
</form>
@endslot

@endcomponent

@component('mahasiswa.component.modal')

@slot("id")
ujian_skripsi
@endslot

@slot("title")
Pengajuan Ijin Ujian Skripsi
@endslot

@slot('form_field')
<form action="{{ url("/permohonan-surat") }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="kode_layanan" value='ijin-ujian'>
    <input type="hidden" name="layanan_surat_id" value='{{ $id_layanan_surat['ijin-ujian'] }}'>
    <div class="form-group">
      <label for="inputPassword4">Judul Skripsi</label>
      <textarea name="judul_skripsi" id="" cols="30" rows="2" class="form-control"></textarea>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="">Dosen Pembimbing</label>
            <select name="dosen_pembimbing" id="" class="form-control">
                @foreach($dosen as $data_dosen)
                    <option value="{{ $data_dosen->id }}"> {{ $data_dosen->nama }} </option>
                @endforeach
            </select>
        </div>
    </div>

<p class="help-block">Segera kumpulkan <strong>draft skripsi yang telah ditandatangani oleh pembimbing</strong> ke kantor Jurusan, agar pengajuan ujian dapat segera diproses. Surat dapat dikonfirmasi di Kantor Jurusan.</p>
<button type="submit" class="btn btn-success pull-right">Proses</button>
</form>
@endslot

@endcomponent


@component('mahasiswa.component.modal')

@slot("id")
keluhan
@endslot

@slot("title")
Aspirasi Anda
@endslot

@slot('form_field')
<form action="{{ url("/keluhan") }}" method="post">
    {{ csrf_field() }}

    <div class="form-group">
      <label for="inputPassword4">Aspirasi</label>
      <textarea name="isi" id="" cols="30" rows="3" class="form-control"></textarea>
      <small class="help-block">Maksimal 230 huruf</small>
  </div>

  <button type="submit" class="btn btn-success pull-right" name="keluhan">Proses</button>
</form>
@endslot

@endcomponent

<div class="modal fade" id="aktif_kuliah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="now-ui-icons ui-1_simple-remove"></i>
                </button>
                <h4 class="title title-up">Surat Aktif Kuliah</h4>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin akan memproses surat aktif kuliah?
                </p>

                <small class="help-block">Surat dapat dikonfirmasi di Admin Fakultas.</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                <form action="{{ url("/permohonan-surat") }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="kode_layanan" value="aktif-kuliah">
                    <input type="hidden" name="layanan_surat_id" value='{{ $id_layanan_surat['aktif-kuliah'] }}'>
                    <button type="submit" class="btn btn-success">Ya</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--  End Modal -->
<!-- Mini Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header justify-content-center">
                <!-- <div class="modal-profile">
                    <i class="now-ui-icons users_circle-08"></i>
                </div> -->
                <h4 class="title title-up">Bantuan</h4>
            </div>
            <div class="modal-body">
                <ul>
                    <li>Durasi Pelayanan hanya <strong>3 menit</strong>, persiapkan berkas yang dibutuhkan.</li>
                    <li>Surat yang telah diproses dapat dikonfirmasi pada admin fakultas.</li>
                </ul>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-link btn-neutral">Back</button>
              <button type="button" class="btn btn-link btn-neutral" data-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>
@endpush

@push("js")

<script src="{{ asset("js/plugins/bootstrap-notify.js") }}" type="text/javascript"></script>
<script src="{{ asset("demo/demo.js") }}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        @if(null != session('message'))
            demo.showNotification('{{ session('message') }}', '{{ session('status') }}');
        @endif

    });
</script>

@endpush

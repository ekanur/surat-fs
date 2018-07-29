@extends("mahasiswa.layout")

@section("content")
<body class="index-page sidebar-collapse" style="background-color: #EDEDEE ">
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg bg-primary fixed-top " color-on-scroll="400">
		<div class="container">
			<div class="navbar-translate">
				{{-- <a class="navbar-brand" href="{{ url("/logout") }}" rel="tooltip" title="Self-service Fakultas Sastra" data-placement="bottom">
                    
                    
				</a>
 --}}                <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="navbar-brand" rel="tooltip" title="Self-service Fakultas Sastra" data-placement="bottom">
                                            <i class="now-ui-icons arrows-1_minimal-left"></i>
                    Logout ({{ session("nim")  }})
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
				<button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-bar bar1"></span>
					<span class="navbar-toggler-bar bar2"></span>
					<span class="navbar-toggler-bar bar3"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="{{ asset("img/blurred-image-1.jpg") }} ">
                <span class="text-center" style="text-align: left">Durasi Layanan : 03 Menit 00 Detik</span>
				<ul class="navbar-nav">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)" onclick="scrollToDownload()">
                            <i class="now-ui-icons arrows-1_cloud-download-93"></i>
                            <p>Download</p>
                        </a>
                    </li> -->
                    <li class="nav-item">
                    	<a class="nav-link" href="#" data-toggle="modal" data-target="#myModal1">
                    		<i class="now-ui-icons files_paper"></i>
                    		<p>Bantuan</p>
                    	</a>
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
        									<h1 class=" text-center"><i class="now-ui-icons education_hat"></i></h1>
        									<p><button data-toggle="modal" data-target="#myModal" class="btn btn-primary">Proses</button></p>
        								</div>
        							</div>
        						</div>
        					</div>
        				</div>

        				<div class="col-md-3 col-lg-3 col-xl-3">
        					<!-- Nav tabs -->
        					<div class="card">
        						<div class="header text-center">
        							<h4 class="title title-up">Ijin PKP</h4>

        						</div>

        						<div class="card-body">
        							<!-- Tab panes -->
        							<div class="tab-content">
        								<div class="tab-pane active" id="home" role="tabpanel">
        									<h1 class=" text-center"><i class="now-ui-icons education_hat"></i></h1>
        									<p><button data-toggle="modal" data-target="#myModal" class="btn btn-primary">Proses</button></p>
        								</div>
        							</div>
        						</div>
        					</div>
        				</div>

        				<div class="col-md-3 col-lg-3 col-xl-3">
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
        									<p><button data-toggle="modal" data-target="#myModal" class="btn btn-primary">Proses</button></p>
        								</div>
        							</div>
        						</div>
        					</div>
        				</div>




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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header justify-content-center">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="now-ui-icons ui-1_simple-remove"></i>
				</button>
				<h4 class="title title-up">Surat Aktif Kuliah</h4>
			</div>
			<div class="modal-body">
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
				<button type="button" class="btn btn-danger"  data-dismiss="modal">Proses</button>
			</div>
		</div>
	</div>
</div>

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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                <form action="{{ url("/aktif-kuliah") }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="mahasiswa_id">
                    <input type="hidden" name="layanan_surat_id" value="1">
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
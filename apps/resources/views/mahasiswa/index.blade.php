@extends("mahasiswa.layout")

@section("content")
<body class="login-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
        <div class="container">
            <div class="dropdown button-dropdown">
                <!-- <a href="#pablo" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                    <span class="button-bar"></span>
                    <span class="button-bar"></span>
                    <span class="button-bar"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-header">Dropdown header</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">One more separated link</a>
                </div> -->
            </div>
            <div class="navbar-translate">
                <a class="navbar-brand" href="#" rel="tooltip" title="Pelayanan pengurusan surat Fakultas Sastra" data-placement="bottom" target="_blank">
                    Self-Service Fakultas Sastra    
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="{{ asset("img/blurred-image-1.jpg") }}">
                <!-- <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.html">Back to Kit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://github.com/creativetimofficial/now-ui-kit/issues">Have an issue?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank">
                            <i class="fa fa-twitter"></i>
                            <p class="d-lg-none d-xl-none">Twitter</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank">
                            <i class="fa fa-facebook-square"></i>
                            <p class="d-lg-none d-xl-none">Facebook</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank">
                            <i class="fa fa-instagram"></i>
                            <p class="d-lg-none d-xl-none">Instagram</p>
                        </a>
                    </li>
                </ul> -->
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="page-header" filter-color="orange">
        <div class="page-header-image" style="background-image:url({{ asset("img/2.jpg") }})"></div>
        <div class="container">
            <div class="col-md-12 content-center">
                <div class="card card-plain">
                    <form class="form" method="post" action="{{ url("/app") }}">
						{{ csrf_field() }}
                        <div class="header header-primary text-center">
                            <div class="logo-container">
                                <!-- <img src="../assets/img/now-logo.png" alt=""> -->
                            </div>
                        </div>
                        <div class="content">
                            <!-- <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons users_circle-08"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Masukan NIM">
                            </div> -->
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Masukan NIM" aria-label="Masukan NIM" name="nim" aria-describedby="button-addon2">
                              <div class="input-group-append">
                                <button class="btn  btn-outline-secondary btn-primary btn-round" name="simpan" type="submit" style="margin:0px;border-radius:0 20% 20% 0 !important">Go</button>
                            </div>
                        </div>
                            <!-- <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons text_caps-small"></i>
                                </span>
                                <input type="text" placeholder="Last Name..." class="form-control" />
                            </div> -->
                        </div>
                        <!-- <div class="footer text-center">
                            <a href="#pablo" class="btn btn-primary btn-round btn-lg btn-block">Get Started</a>
                        </div> -->
                        <!-- <div class="pull-left">
                            <h6>
                                <a href="#pablo" class="link">Create Account</a>
                            </h6>
                        </div>
                        <div class="pull-right">
                            <h6>
                                <a href="#pablo" class="link">Need Help?</a>
                            </h6>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <nav>
                    <!-- <ul>
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
                    </ul> -->
                </nav>
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, Bekerja sama dengan <a href="http://illiyin.co">Illiyin Studio</a>
                </div>
            </div>
        </footer>
    </div>
</body>
@endsection
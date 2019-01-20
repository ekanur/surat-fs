@extends("mahasiswa.layout")

@section("content")
<body class="login-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
        <div class="container">
            <div class="dropdown button-dropdown">
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
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="page-header" filter-color="orange">
        <div class="page-header-image" style="background-image:url({{ asset("img/2.jpg") }})"></div>
        <div class="container">
            <div class="col-md-4 ml-auto mr-auto">
                <div class="card card-login card-plain">
                    <form class="form" method="POST" action="{{ route('mahasiswa.login.submit') }}">
                        {{ csrf_field() }}
                    <div class="card-header text-center">
                      <div class="logo-container">
                        {{-- <img src="../assets/img/now-logo.png" alt=""> --}}
                    </div>
                </div>
                <div class="card-body">
                  <div class="input-group no-border input-lg">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="now-ui-icons users_circle-08"></i>
                    </span>
                </div>
                <input type="text" name="nim" class="form-control" autocomplete="off" placeholder="Nomor Induk Mahasiswa">
            </div>

            <div class="input-group no-border input-lg">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="now-ui-icons text_caps-small"></i>
                </span>
            </div>
            <input type="password" name="password" placeholder="...." class="form-control">
        </div>
    </div>
    <div class="card-footer text-center">
      <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">Masuk</button>

</div></form>
</div>
</div>
</div>
<footer class="footer">
    <div class="container">
        <nav>
                </nav>
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, Bekerja sama dengan <strong>Illiyin Studio</strong>
                </div>
            </div>
        </footer>
    </div>
</body>
@endsection

@extends("mahasiswa.layout")

@section("content")
<body class="login-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
        <div class="container">
            {{-- <div class="dropdown button-dropdown">
            </div>
            <div class="navbar-translate">
                <a class="navbar-brand" href="#" rel="tooltip" title="Pelayanan pengurusan surat Fakultas Sastra" data-placement="bottom" target="_blank">

                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div> --}}
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="{{ asset("img/blurred-image-1.jpg") }}">
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="page-header clear-filter" filter-color="orange">
        <div class="page-header-image" style="background-image:url({{ asset("img/2.jpg") }})"></div>
        <div class="container">
            <div class="col-md-4 ml-auto mr-auto">
                <div class="card card-login card-plain">
                    <form class="form" method="POST" action="{{ route('mahasiswa.login.submit') }}">
                        {{ csrf_field() }}
                    <div class="card-header text-center" style="margin-top:20vh">
                        Self-Service Fakultas Sastra

                    </div>
                <div class="card-body">
                  <div class="input-group no-border input-lg">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="now-ui-icons users_circle-08"></i>
                    </span>
                </div>
                <input type="text" name="nim" class="form-control" placeholder="Nomor Induk Mahasiswa">
            </div>

            <div class="input-group no-border input-lg">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="now-ui-icons ui-1_lock-circle-open"></i>
                </span>
            </div>
            <input type="password" name="password" placeholder="Password" class="form-control">
        </div>
    </div>
    <div class="card-footer text-center">
      <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">Login</button>

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
                    </script>, Bekerja sama dengan <strong style="color:orange">Illiyin Studio</strong>
                </div>
            </div>
        </footer>
    </div>
</body>
@endsection


@push("css")
<style type="text/css">
    span.input-group-text{
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding: .375rem .75rem;
        margin-bottom: 0;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        text-align: center;
        white-space: nowrap;
    }
</style>
@endpush

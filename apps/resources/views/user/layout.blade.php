<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset("img/apple-icon.png") }}">
  <link rel="icon" type="image/png" href="{{ asset("img/favicon.png") }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Self-Service | Pelayanan Permohonan Surat Fakultas Sasta
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{ asset("demo/demo.css") }}">
  <link href="{{ asset("css/now-ui-dashboard.css?v=1.1.0") }}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{ asset("/plugin/datatable/datatables.min.css") }}">

  @stack("css")
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="blue">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo text-center">
        
        <a href="" class="simple-text logo-normal">
          {{ Auth::user()->tipe }} | Surat-FS
        </a>
      </div>
      <div class="sidebar-wrapper">
        @if(auth()->user()->tipe == 'admin')
          @include("user.menus.admin")
        @else
          @include("user.menus.default")
        @endif
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            {{-- <a class="navbar-brand" href="{{ url("/dekan") }}">Dashboard</a> --}}
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
           
            <ul class="navbar-nav">
             
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    {{ Auth::guard("web")->user()->username }}
                    <span class="d-lg-none d-md-block">Account</span>
                    
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="dropdown-item text-danger">
                            <i class="now-ui-icons media-1_button-power"></i>
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                </div>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      @yield("content")
      <footer class="footer">
        <div class="container-fluid">
          <nav>
            <ul>
              <!-- <li>
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
              </li> -->
            </ul>
          </nav>
          <div class="copyright">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, Bekerja sama dengan
            <a href="http://www.illiyin.co" target="_blank">Illiyin Studio</a>. 
          </div>
        </div>
      </footer>
    </div>
  </div>

  @stack("modal")
  <!--   Core JS Files   -->
  <script src="{{ asset("js/core/jquery.min.js") }}"></script>
  <script src="{{ asset("js/core/popper.min.js") }}"></script>
  <script src="{{ asset("js/core/bootstrap.min.js") }}"></script>
  <script src="{{ asset("js/plugins/perfect-scrollbar.jquery.min.js") }}"></script>
  <!--  Google Maps Plugin    -->
  {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
  <!-- Chart JS -->
  <script src="{{ asset("js/plugins/chartjs.min.js") }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset("js/plugins/bootstrap-notify.js") }}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset("js/now-ui-dashboard.min.js?v=1.1.0") }}" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script type="text/javascript" src="{{ asset("demo/demo.js") }}"></script>
  <script type="text/javascript" src="{{ asset("plugin/datatable/datatables.min.js") }}"></script>
  <script type="text/javascript" src="{{ asset("plugin/datatable/js/dataTables.buttons.min.js") }}"></script>
  <script type="text/javascript" src="{{ asset("plugin/datatable/js/buttons.flash.min.js") }}"></script>
  <script type="text/javascript" src="{{ asset("plugin/datatable/js/jszip.min.js") }}"></script>
  <script type="text/javascript" src="{{ asset("plugin/datatable/js/pdfmake.min.js") }}"></script>
  <script type="text/javascript" src="{{ asset("plugin/datatable/js/vfs_fonts.js") }}"></script>
  <script type="text/javascript" src="{{ asset("plugin/datatable/js/buttons.html5.min.js") }}"></script>
  <script type="text/javascript" src="{{ asset("plugin/datatable/js/buttons.print.min.js") }}"></script>
  <script>
    $(document).ready(function() {

      $("table.datatable").DataTable({
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;

                if(column[0][0] == 3 && column.data().length > 0){
                  var select = $('<select class="form-control" style="width:70px;height:15px"><option value="">Semua</option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                  // console.log(column.data());
 
                  column.data().unique().sort().each( function ( d, j ) {
                      select.append( '<option value="'+d+'">'+d+'</option>' )
                  } );
                }
                
            } );
        },
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    } );
      // Javascript method's body can be found in assets/js/demos.js

      // demo.initDashboardPageCharts();
      @if ($errors->any())
      var error = '<ul>';
            @foreach ($errors->all() as $error)
                error += '<li>{{ $error }}</li>';
            @endforeach
      error += '</ul>';
      demo.showNotification(error, 'danger');                    
      @endif

      @if (session('success'))
      var msg = "{{ session('success') }}";
      demo.showNotification(msg, 'success');                    
      @endif

    });
  </script>
  @stack("js")
</body>

</html>

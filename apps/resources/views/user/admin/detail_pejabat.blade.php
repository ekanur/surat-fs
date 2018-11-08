@extends("user.layout")

@section("content")


<div class="panel-header panel-header-lg">
	{{-- <canvas id="bigDashboardChart"></canvas> --}}
</div>
<div class="content">

	<div class="row">
		<div class="col-md-12">
			<div class="card  card-tasks">
				<div class="card-header ">
					<h4 class="card-title">{{ ucfirst($pejabat->tipe) }} {{ usernameToJurusan($pejabat->username) }}</h4>
					
				</div>
				<div class="card-body ">
					<!-- <div class="table-full-width table-responsive"> -->
						
						<!-- </div> -->
					</div>
					<div class="card-footer ">
						{{-- <hr> --}}
						{{-- <div class="stats">
							<button class="btn btn-success">Cetak (1 Surat)</button>
						</div> --}}
					</div>
			</div>
		</div>

	</div>
</div>


@endsection

@section("menu")
	@if(Auth::user()->tipe == 'admin')
		@include("user.menus.admin")
	@else
		@include("user.menus.default")
	@endif
@endsection


@extends("user.layout")

@section("menu")
	@if(auth()->user()->tipe == "admin")
		@include("user.menus.admin")
	@else
		@include("user.menus.default")
	@endif
@endsection

@section("content")

<div class="panel-header panel-header-lg">
	{{-- <canvas id="bigDashboardChart"></canvas> --}}
</div>
<div class="content">

	<div class="row">
		<div class="col-md-12">
			<div class="card  card-tasks">
				<div class="card-header ">
					<h5 class="card-category"></h5>
					<h4 class="card-title">Aspirasi</h4>
				</div>
				<div class="card-body ">
					<!-- <div class="table-full-width table-responsive"> -->
						<table class="table table-hover">
							<thead>
								<tr>
									<th width="5%">No</th>
									<th width="30%">Nama Mahasiswa</th>
									<th width="20%">Jurusan</th>
									<th width="45%">Aspirasi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($keluhan as $keluhan)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>
										{{ $keluhan->mahasiswa->nama }}<br/>
										<small><em>{{ $keluhan->nim }}</em></small>
									</td>
									<td>{{ $keluhan->mahasiswa->jurusan }}</td>
									<td>
										{{ $keluhan->isi }}<br/>
										<small><i class="now-ui-icons ui-1_calendar-60"></i> <em>{{ $keluhan->created_at }}</em></small>
									</td>
								</tr>
								@endforeach
                            </tbody>
                            
						</table>
						<!-- </div> -->
					</div>
					<div class="card-footer ">
						{{-- <hr> --}}
						{{-- <div class="stats">
							<button class="btn btn-success">Verifikasi (2 Surat)</button>
						</div> --}}
					</div>
			</div>
		</div>

	</div>
</div>

@endsection
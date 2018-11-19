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
					<h5 class="card-category"></h5>
					<h4 class="card-title">Permohonan Surat</h4>
				</div>
				<div class="card-body ">
					<!-- <div class="table-full-width table-responsive"> -->
						<table class="table table-hover">
							<thead>
								<tr>
									<th width="15%">Tanggal</th>
									<th width="25%">Surat</th>
									<th width="25%">Pemohon</th>
									<th width="15%">Status</th>
									<th width="15%">Usia Surat</th>
									<th width="5%">Cetak</th>
								</tr>
							</thead>
							<tbody>
								@foreach($permohonan_surat as $permohonan_surat)
									<tr>
										<td>
											{{ $permohonan_surat->created_at }}
										</td>
										<td class="text-left"><a href="{{ url($permohonan_surat->layanan_surat->kode_layanan."/".$permohonan_surat->id) }}" target="_blank">{{ $permohonan_surat->layanan_surat->judul }}</a> </td>
										<td>
											{{ $permohonan_surat->mahasiswa->nama }}
										</td>
										<td>
											{{ $permohonan_surat->status }}
										</td>
										<td>
											{{ usia_surat($permohonan_surat->created_at) }} hari
										</td>
										<td>
											@if($permohonan_surat->status == 'siap_cetak')
												<a href="{{ url($permohonan_surat->layanan_surat->kode_layanan."/".$permohonan_surat->id."/print") }}" class="btn btn-success btn-round btn-icon btn-icon-mini btn-neutral" target="_blank">
												<i class="now-ui-icons arrows-1_cloud-download-93"></i>
											</a>
											@else
												<button class="btn btn-success btn-round btn-icon btn-icon-mini btn-neutral" disabled=""><i class="now-ui-icons arrows-1_cloud-download-93"></i></button>
											@endif
											
										</td>
									</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
								</tr>
							</tfoot>
						</table>
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


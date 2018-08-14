@extends("user.layout")

@section("menu")
	@include("user.menus.default")
@endsection

@section("content")

<div class="panel-header panel-header-lg">
	<canvas id="bigDashboardChart"></canvas>
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
									{{-- <th class="text-center" width="10%">#</th> --}}
									<th width="45%">Surat</th>
									<th width="35%">Pemohon</th>
									<th class="text-right">Usia Surat</th>
								</tr>
							</thead>
							<tbody>
								@foreach($verifikasi as $verifikasi)
									<tr>
										<td class="text-left"><a href="" data-toggle="modal" data-target="#detailSurat" data-permohonan_surat_id="{{ $verifikasi->permohonan_surat_id }}">{{ $verifikasi->permohonan_surat->layanan_surat->judul }}</a> </td>
										<td>
											{{ $verifikasi->mahasiswa->nama }}
										</td>
										<td class="td-actions text-right">
											{{ 1 }} hari
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

@push("modal")

@component("user.component.modal")
@slot("id")
detailSurat
@endslot

@slot("title")
Surat Aktif Kuliah
@endslot
@endcomponent

@endpush
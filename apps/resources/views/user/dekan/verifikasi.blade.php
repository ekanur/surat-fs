@extends("user.layout")

@section("menu")
	@include("user.menus.default")
@endsection

@section("content")

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
								<tr>
									

									<td class="text-left"><a href="">Permohonan Aktif Kuliah</a> </td>
									<td>
										Ibnu Suhaemy (112373790)
									</td>
									<td class="td-actions text-right">
										1 hari
									</td>
								</tr>
								<tr>
									

									<td class="text-left"><a href="">Permohonan KKP</a></td>
									<td>
										Ibnu Suhaemy (112373790)
									</td>
									<td class="td-actions text-right">
										1 hari
									</td>
								</tr>
								<tr>
									

									<td class="text-left"><a href="#" data-toggle="modal" data-target="detail_surat">Permohonan Judul Skripsi</a>
									</td>
									<td>
										Ibnu Suhaemy (112373790)
									</td>
									<td class="td-actions text-right">

										1 hari
									</td>
								</tr>
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
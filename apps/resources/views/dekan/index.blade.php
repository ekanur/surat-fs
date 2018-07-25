@extends("dekan.layout")

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
									<th class="text-center" width="10%">#</th>
									<th width="50%">Surat</th>
									<th width="30%">Pemohon</th>
									<th class="text-right">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input" type="checkbox" checked>
												<span class="form-check-sign"></span>
											</label>
										</div>
									</td>

									<td class="text-left"><a href="">Permohonan Aktif Kuliah</a> </td>
									<td>
										Ibnu Suhaemy (112373790)
									</td>
									<td class="td-actions text-right">
										<button type="button" rel="tooltip" title="" class="btn btn-success btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Verifikasi">
											<i class="now-ui-icons ui-1_check"></i>
										</button>
										{{-- <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
											<i class="now-ui-icons ui-1_simple-remove"></i>
										</button> --}}
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input" type="checkbox">
												<span class="form-check-sign"></span>
											</label>
										</div>
									</td>

									<td class="text-left"><a href="">Permohonan KKP</a></td>
									<td>
										Ibnu Suhaemy (112373790)
									</td>
									<td class="td-actions text-right">
										<button type="button" rel="tooltip" title="" class="btn btn-success btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Verifikasi">
											<i class="now-ui-icons ui-1_check"></i>
										</button>
										{{-- <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
											<i class="now-ui-icons ui-1_simple-remove"></i>
										</button> --}}
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input" type="checkbox" checked>
												<span class="form-check-sign"></span>
											</label>
										</div>
									</td>

									<td class="text-left"><a href="">Permohonan Judul Skripsi</a>
									</td>
									<td>
										Ibnu Suhaemy (112373790)
									</td>
									<td class="td-actions text-right">
										<button type="button" rel="tooltip" title="" class="btn btn-success btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Verifikasi">
											<i class="now-ui-icons ui-1_check"></i>
										</button>
										{{-- <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
											<i class="now-ui-icons ui-1_simple-remove"></i>
										</button> --}}
									</td>
								</tr>
							</tbody>
						</table>
						<!-- </div> -->
					</div>
					<div class="card-footer ">
						<hr>
						<div class="stats">
							<button class="btn btn-success">Verifikasi (2 Surat)</button>
						</div>
					</div>
			</div>
		</div>

	</div>
</div>

@endsection
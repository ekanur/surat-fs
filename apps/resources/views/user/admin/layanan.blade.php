@extends("user.layout")

@section("content")

<div class="panel-header panel-header-lg">
	{{-- <canvas id="bigDashboardChart"></canvas> --}}
</div>
<div class="content">

	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card  card-tasks">
				<div class="card-header ">
					<h5 class="card-category"></h5>
					<h4 class="card-title">Layanan Surat</h4>
				</div>
				<div class="card-body ">
					<!-- <div class="table-full-width table-responsive"> -->
						<table class="table table-hover">
							<thead>
								<tr>
									<th width="5%">No</th>
									<th width="85%">Layanan</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($layanan_surat as $layanan_surat)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $layanan_surat->judul }}
											@if($layanan_surat->kode_layanan == 'pengajuan-skripsi')
											<label class="switch ">
												<input type="checkbox" @unless ($layanan_surat->is_active == 0)
													checked
												@endunless class="default">
												<span class="slider round"></span>
											  </label>
											@endif
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

@push("js")
<script src="{{asset("js/plugins/bootstrap-switch.js")}}"></script>
<script>
$(document).ready(function(){
	$('.bootstrap-switch').each(function(){
		$this = $(this);
		data_on_label = $this.data('on-label') || '';
		data_off_label = $this.data('off-label') || '';

		$this.bootstrapSwitch({
			onText: data_on_label,
			offText: data_off_label
		});
	});
});
</script>
@endpush
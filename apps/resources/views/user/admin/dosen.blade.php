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
					<h4 class="card-title">Dosen
						<a class="float-right btn btn-sm btn-success" href="{{ url("admin/dosen/") }}">Baru</a>
						<a class="float-right btn btn-sm btn-info" href="#" data-toggle="modal" data-target="#import">Import</a>
					</h4>
				</div>
				<div class="card-body ">
					<!-- <div class="table-full-width table-responsive"> -->
						<table class="table table-hover datatable">
							<thead>
								<tr>
									<th width="40%">Nama</th>
									<th width="20%">NIP</th>
									<th width="15%">Jurusan</th>
									<th width="5%">Opsi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($dosen as $dosen)
									<tr>
										<td class="text-left"><a href="#" data-toggle="modal">{{ $dosen->nama }}</a> </td>
										<td>
											{{ $dosen->nip }}
										</td>
										<td>
											{{ $dosen->jurusan }}
										</td>
										<td class="td-actions text-right">
											<a href="" class="btn btn-sm btn-info">Edit</a>
											{{-- <a href="" class="btn btn-sm btn-danger"><i class="now-ui-icons ui-1_simple-remove"></i> Hapus</a> --}}
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
							<button class="btn btn-success">Cetak (1 Surat)</button>
						</div> --}}
					</div>
			</div>
		</div>

	</div>
</div>


@endsection

@push("modal")
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="{{ url("/admin/import-dosen") }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Dari Excel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group row" id="input-verifikasi">
	          <div class="col-sm-12">
	            <input class="form-control" type="file" name="file_import" style="opacity: 0.55; position: initial;">
	          </div>
	      </div>
	      <p class="text-info">Untuk mengimport, gunakan file <a href="{{ asset("format_import_dosen.xlsx") }}"><u>berikut</u></a>.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-success" id="btn-simpan">Import</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endpush
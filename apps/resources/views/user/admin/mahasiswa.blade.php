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
					<h4 class="card-title">Mahasiswa
						<a class="float-right btn btn-sm btn-success" href="{{ url("admin/mahasiswa/") }}">Baru</a>
						<a class="float-right btn btn-sm btn-info" href="#" data-toggle="modal" data-target="#import">Import</a>
					</h4>
				</div>
				<div class="card-body ">
					<!-- <div class="table-full-width table-responsive"> -->
						<table class="table table-hover datatable">
							<thead>
								<tr>
									<th width="30%">Nama</th>
									<th width="20%">Nim</th>
									<th width="15%">Jurusan</th>
									<th width="55%">Opsi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($mahasiswa as $mahasiswa)
									<tr>
										<td class="text-left"><a href="#" data-toggle="modal">{{ $mahasiswa->nama }}</a> </td>
										<td>
											{{ $mahasiswa->nim }}
										</td>
										<td>
											{{ $mahasiswa->jurusan }}
										</td>
										<td class="td-actions text-right">
										<a href="#" data-target="#resetPassword" data-toggle="modal" data-id="{{ $mahasiswa->id }}" data-nim="{{ $mahasiswa->nim }}" class="btn btn-sm btn-info"><i class="now-ui-icons ui-1_lock-circle-open"></i> Reset Password</a>
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
      <form action="{{ url("/admin/import-mahasiswa") }}" method="post" enctype="multipart/form-data">
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
	      <p class="text-info">Untuk mengimport, gunakan file <a href="{{ asset("format_import_mhs.xlsx") }}"><u>berikut</u></a>.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-success" id="btn-simpan">Import</button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="resetPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <form action="{{ url("/mahasiswa/reset-password") }}" method="post">
        {{ csrf_field() }}
      <div class="modal-header">
        <h5 class="modal-title" style="text-align:center" id="exampleModalLabel">Apakah anda yakin akan mereset password Mahasiswa?</h5>
        
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group row" id="input-verifikasi">
	          <div class="col-sm-12">
							<p class="text-info">Setelah berhasil di-reset, password mahasiswa akan menjadi nim mahasiswa <blockquote id="new_password"></blockquote></p>
	            <input class="form-control" type="hidden" name="id">
	            <input class="form-control" type="hidden" name="nim">
	          </div>
	      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-info" id="btn-simpan">Reset</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endpush

@push("js")
<script>
	$(document).ready(function(){
		$("#resetPassword").on("show.bs.modal", function (event) {
                const reset = $(event.relatedTarget);
                var id = reset.data("id");
                var nim = reset.data("nim");
                
                $("input[name='id']").val(id);
                $("input[name='nim']").val(nim);
                $("#new_password").html(nim);
            });
	});
</script>
@endpush
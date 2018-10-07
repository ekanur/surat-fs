@extends("user.layout")

@section("menu")
	@include("user.menus.default")
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
									<th width="35%">Status</th>
									<th class="text-right">Usia Surat</th>
								</tr>
							</thead>
							<tbody>
								@foreach($verifikasi as $verifikasi)
									<tr>
										<td class="text-left"><a href="" data-toggle="modal" data-target="#detailSurat" data-permohonan_surat_id="{{ $verifikasi->permohonan_surat_id }}" data-kode_layanan="{{ $verifikasi->permohonan_surat->layanan_surat->kode_layanan }}" data-fitur-verifikasi="{{ $verifikasi->bisa_verifikasi }}">{{ $verifikasi->permohonan_surat->layanan_surat->judul }}</a> </td>
										<td>
											{{ $verifikasi->mahasiswa->nama }}
										</td>
										<td>
											{{ $verifikasi->status }}
										</td>
										<td class="td-actions text-right">
											{{ usia_surat($verifikasi->permohonan_surat->created_at) }} hari
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
Verifikasi Surat
@endslot

@slot("action")
{{ route("verifikasi.aktif-kuliah") }}
@endslot

@slot("content")
<input type="hidden" name="permohonan_surat_id">
<div id="iframe_container embed-responsive embed-responsive-1by1">
<iframe frameborder="0" src="" class="embed-responsive-item" frameborder="0" id="detail_surat" style="" width="770px" height="800px"></iframe>	
</div>
<div class="form-group row" id="input-verifikasi" style="display: none">
    <label for="verifikasi" class="col-sm-2 col-form-label">Setuju/Tolak</label>
    <div class="col-sm-10">
      <select class="form-control" name="status" id="">
        <option value="setuju">Setujui</option>
        <option value="tolak">Tolak</option>
      </select>
    </div>
</div>
@endslot
@endcomponent

@endpush

@push("js")
<script type="text/javascript">
	$(document).ready(function(){
		$("#detailSurat").on("show.bs.modal", function (event) {
                const detail_surat = $(event.relatedTarget);
                var kode_layanan = detail_surat.data("kode_layanan");
                var url = "{{ url("/") }}/"+kode_layanan;
                var permohonan_surat_id = detail_surat.data("permohonan_surat_id");
                var bisa_verifikasi = detail_surat.data("fitur-verifikasi");

                if (bisa_verifikasi) {
                	$("#input-verifikasi").css("display", "flex");
                	$("#btn-simpan").css("display", "block");
                }

                $("iframe#detail_surat").attr("src", url+"/"+permohonan_surat_id);
                $("input[name='permohonan_surat_id']").val(permohonan_surat_id);
            });
	});
</script>
@endpush

@push("css")
<style>
	#iframe_container{
		overflow: hidden;
		padding-top: 50%;
		position: relative;
	}

	#iframe_container iframe{
		border: 0;
		height: 100%;
		left: 0;
		top: 0;
		width: 100%;
		position: absolute;
	}
</style>
@endpush
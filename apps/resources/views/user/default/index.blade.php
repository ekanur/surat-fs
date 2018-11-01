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
										<td class="text-left">
                                            <a href="" data-toggle="modal" data-target="#{{ camel_case($verifikasi->permohonan_surat->layanan_surat->kode_layanan) }}" data-permohonan_surat_id="{{ $verifikasi->permohonan_surat_id }}" data-kode_layanan="{{ $verifikasi->permohonan_surat->layanan_surat->kode_layanan }}" data-fitur-verifikasi="{{ $verifikasi->bisa_verifikasi }}" data-status="{{ $verifikasi->status }}">{{ $verifikasi->permohonan_surat->layanan_surat->judul }}</a>
                                        </td>
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
aktifKuliah
@endslot

@slot("title")
Verifikasi Surat Aktif Kuliah
@endslot

@slot("action")
{{ route("verifikasi.aktif-kuliah") }}
@endslot

@slot("content")
<input type="hidden" name="permohonan_surat_id">
<div id="iframe_container embed-responsive embed-responsive-1by1">
<iframe frameborder="0" src="" class="embed-responsive-item" frameborder="0" id="detail_surat" style="" width="770px" height="800px"></iframe>	
</div>
{{-- <div class="form-group row" id="input-verifikasi" style="display: none">
    <label for="verifikasi" class="col-sm-2 col-form-label">Setuju/Tolak</label>
    <div class="col-sm-10">
      <select class="form-control" name="status" id="">
        <option value="setuju">Setujui</option>
        <option value="tolak">Tolak</option>
      </select>
    </div>
</div> --}}
@endslot
@endcomponent

@endpush

@push("modal")

@component("user.component.modal")
@slot("id")
ijinObservasi
@endslot

@slot("title")
Verifikasi Surat Ijin Observasi
@endslot

@slot("action")
{{ route("verifikasi.aktif-kuliah") }}
@endslot

@slot("content")
<input type="hidden" name="permohonan_surat_id">
<div id="iframe_container embed-responsive embed-responsive-1by1">
<iframe frameborder="0" src="" class="embed-responsive-item" frameborder="0" id="detail_surat" style="" width="770px" height="800px"></iframe>  
</div>
{{-- <div class="form-group row" id="input-verifikasi" style="display: none">
    <label for="verifikasi" class="col-sm-2 col-form-label">Setuju/Tolak</label>
    <div class="col-sm-10">
      <select class="form-control" name="status" id="">
        <option value="setuju">Setujui</option>
        <option value="tolak">Tolak</option>
      </select>
    </div>
</div> --}}
@endslot
@endcomponent

@endpush

@push("modal")

@component("user.component.modal")
@slot("id")
ijinPeneltian
@endslot

@slot("title")
Verifikasi Surat Ijin Peneltian
@endslot

@slot("action")
{{ route("verifikasi.aktif-kuliah") }}
@endslot

@slot("content")
<input type="hidden" name="permohonan_surat_id">
<div id="iframe_container embed-responsive embed-responsive-1by1">
<iframe frameborder="0" src="" class="embed-responsive-item" frameborder="0" id="detail_surat" style="" width="770px" height="800px"></iframe>  
</div>
{{-- <div class="form-group row" id="input-verifikasi" style="display: none">
    <label for="verifikasi" class="col-sm-2 col-form-label">Setuju/Tolak</label>
    <div class="col-sm-10">
      <select class="form-control" name="status" id="">
        <option value="setuju">Setujui</option>
        <option value="tolak">Tolak</option>
      </select>
    </div>
</div> --}}
@endslot
@endcomponent

@endpush


@push("modal")

@component("user.component.modal")
@slot("id")
pengajuanSkripsi
@endslot

@slot("title")
Pengajuan Judul Skripsi
@endslot

@slot("action")
{{ route("verifikasi.pengajuan-skripsi") }}
@endslot

@slot("content")
<div class="row">
    <div class="col-md-12">
        <ul class="list-inline">
            <li class="list-inline-item"><a disabled="" id="cetak" class="btn btn-info" href="" target="_blank"><i class="fa fa-m"></i>Cetak</a></li>
            <li class="list-inline-item"><a disabled="" id="lihat" class="btn btn-info" href="" target="_blank">Lihat</a></li>
        </ul>
    </div>
    
</div>
<input type="hidden" name="permohonan_surat_id">
<input type="hidden" name="judul">
<input type="hidden" name="dosen">
<div class="form-group row" id="input-verifikasi" style="display: none">
    <label for="verifikasi" class="col-sm-2 col-form-label">Judul </label>
    <div class="col-sm-10">
      <ul id="judul">
      </ul>
    </div>
</div>

<div class="form-group row" id="input-verifikasi" style="display: none">
    <label for="verifikasi" class="col-sm-2 col-form-label">Pembimbing </label>
    <div class="col-sm-10">
      <ol start="1" id="pembimbing">
      </ol>
    </div>
</div>

<div class="form-group row" id="input-verifikasi" style="display: none">
    <label for="verifikasi" class="col-sm-2 col-form-label">Pilih Judul </label>
    <div class="col-sm-10">
    	<select name="pilih_judul" id="" class="form-control">
    	</select>
    </div>
</div>

<div class="form-group row" id="input-verifikasi" style="display: none">
    <label for="verifikasi" class="col-sm-2 col-form-label">Pembimbing 1 </label>
    <div class="col-sm-10">
    	<select name="pilih_pembimbing[]" id="pilih_pembimbing1" class="form-control">
            @foreach($dosen as $data_dosen)
                <option value="{{ $data_dosen["id"] }}">{{ $data_dosen["nama"] }}</option> 
            @endforeach
    	</select>
    </div>
</div>

<div class="form-group row" id="input-verifikasi" style="display: none">
    <label for="verifikasi" class="col-sm-2 col-form-label">Pembimbing 2 </label>
    <div class="col-sm-10">
    	<select name="pilih_pembimbing[]" id="pilih_pembimbing2" class="form-control">
    		@foreach($dosen as $data_dosen)
                <option value="{{ $data_dosen["id"] }}">{{ $data_dosen["nama"] }}</option> 
            @endforeach
    	</select>
    </div>
</div>

@endslot
@endcomponent

@endpush

@push("js")
<script type="text/javascript">
	$(document).ready(function(){
		$("#aktifKuliah").on("show.bs.modal", function (event) {
                const detail_surat = $(event.relatedTarget);
                var kode_layanan = detail_surat.data("kode_layanan");
                var url = "{{ url("/") }}/"+kode_layanan;
                var permohonan_surat_id = detail_surat.data("permohonan_surat_id");
                var bisa_verifikasi = detail_surat.data("fitur-verifikasi");
                var status = detail_surat.data("status");

                if (bisa_verifikasi) {
                	$("#aktifKuliah #input-verifikasi").css("display", "flex");
                	$("#aktifKuliah #btn-simpan").css("display", "block");
                    $("#aktifKuliah select[name='status']").val(status);
                }

                $("#aktifKuliah iframe#detail_surat").attr("src", url+"/"+permohonan_surat_id);
                $("#aktifKuliah input[name='permohonan_surat_id']").val(permohonan_surat_id);
            });

        $("#ijinObservasi").on("show.bs.modal", function (event) {
                const detail_surat = $(event.relatedTarget);
                var kode_layanan = detail_surat.data("kode_layanan");
                var url = "{{ url("/") }}/"+kode_layanan;
                var permohonan_surat_id = detail_surat.data("permohonan_surat_id");
                var bisa_verifikasi = detail_surat.data("fitur-verifikasi");
                var status = detail_surat.data("status");

                if (bisa_verifikasi) {
                    $("#ijinObservasi #input-verifikasi").css("display", "flex");
                    $("#ijinObservasi #btn-simpan").css("display", "block");
                    $("#ijinObservasi select[name='status']").val(status);
                }

                $("#ijinObservasi iframe#detail_surat").attr("src", url+"/"+permohonan_surat_id);
                $("#ijinObservasi input[name='permohonan_surat_id']").val(permohonan_surat_id);
            });

        $("#ijinPenelitian").on("show.bs.modal", function (event) {
                const detail_surat = $(event.relatedTarget);
                var kode_layanan = detail_surat.data("kode_layanan");
                var url = "{{ url("/") }}/"+kode_layanan;
                var permohonan_surat_id = detail_surat.data("permohonan_surat_id");
                var bisa_verifikasi = detail_surat.data("fitur-verifikasi");
                var status = detail_surat.data("status");

                if (bisa_verifikasi) {
                    $("#ijinPenelitian #input-verifikasi").css("display", "flex");
                    $("#ijinPenelitian #btn-simpan").css("display", "block");
                    $("#ijinPenelitian select[name='status']").val(status);
                }

                $("#ijinPenelitian iframe#detail_surat").attr("src", url+"/"+permohonan_surat_id);
                $("#ijinPenelitian input[name='permohonan_surat_id']").val(permohonan_surat_id);
            });

		$("#pengajuanSkripsi").on("show.bs.modal", function (event) {
                $("a#cetak, a#lihat").attr("disabled", true);
                const detail_surat = $(event.relatedTarget);
                var kode_layanan = detail_surat.data("kode_layanan");
                var permohonan_surat_id = detail_surat.data("permohonan_surat_id");
                var bisa_verifikasi = detail_surat.data("fitur-verifikasi");
                var status = detail_surat.data("status");

                if (bisa_verifikasi) {
                // alert(bisa_verifikasi);
                	$("#pengajuanSkripsi #input-verifikasi").css("display", "flex");
                	$("#pengajuanSkripsi #btn-simpan").css("display", "block");
                    $("#pengajuanSkripsi select[name='status']").val(status);
                }

                if(status == 'setuju'){
                    $("a#cetak, a#lihat").attr("disabled", false);

                    $("a#cetak").attr("href", "{{ url("pengajuan-skripsi") }}/"+permohonan_surat_id+"/print");
                    $("a#lihat").attr("href", "{{ url("pengajuan-skripsi") }}/"+permohonan_surat_id);
                }
                

                $("#pembimbing").empty();
                $("#judul").empty();
                $("select[name='pilih_judul']").empty();

                $.get('{{ url("permohonan-surat/konten") }}/'+permohonan_surat_id, function(data, status){
                	// console.log(data);
                    let konten = JSON.parse(data);
                    $("#pengajuanSkripsi input[name='judul']").val(JSON.stringify(konten.judul));
                    
                    $("#pengajuanSkripsi input[name='dosen']").val(JSON.stringify(konten.dosen));
                    for (var i = 0; i <= konten.dosen.length - 1; i++) {
                        $("#pembimbing").append("<li>"+ konten.dosen[i].nama +"</li>");
                    }

                    for (var i = 0; i <= konten.judul.length - 1; i++) {
                        $("#judul").append("<li>"+ konten.judul[i] +"</li>");
                        $("select[name='pilih_judul']").append("<option value='"+ konten.judul[i] +"'>"+ konten.judul[i] +"</option>");
                    }

                    $("#pilih_pembimbing1").val(konten.dosen_disetujui[0].id);
                    $("#pilih_pembimbing2").val(konten.dosen_disetujui[1].id);
                    $("select[name='pilih_judul']").val(konten.judul_disetujui);


                });

                // $("iframe#detail_surat").attr("src", url+"/"+permohonan_surat_id);
                $("#pengajuanSkripsi input[name='permohonan_surat_id']").val(permohonan_surat_id);
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
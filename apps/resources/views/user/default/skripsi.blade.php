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
					<h4 class="card-title">Skripsi</h4>
				</div>
				<div class="card-body ">
					<!-- <div class="table-full-width table-responsive"> -->
						<table class="table table-hover datatable">
							<thead>
								<tr>
									<th width="5%">No</th>
									<th width="20%">Nama Mahasiswa</th>
									<th width="30%">Judul</th>
									<th width="15%">Lokasi</th>
									<th width="30%">Penguji</th>
								</tr>
							</thead>
							<tbody>
								@foreach($ijin_ujian as $ijin_ujian)
									<tr>
                                        <td>{{ $loop->iteration }}</td>
										<td>
											{{ $ijin_ujian->mahasiswa->nama }}
                                        </td>
										<td>
											{{ $ijin_ujian->konten->judul }}
										</td>
										<td>
                                            @if ($ijin_ujian->konten->ruang != "''" && $ijin_ujian->konten->waktu != "''")
                                                <span class="badge badge-info">{{ $ijin_ujian->konten->ruang }}</span><br/><span class="badge badge-info">@if(!is_null($ijin_ujian->konten->tanggal)) {{ $ijin_ujian->konten->tanggal->format("d")." ".bulan($ijin_ujian->konten->tanggal->format("m"))." ".$ijin_ujian->konten->tanggal->format("Y") }} @endif @if(!is_null($ijin_ujian->konten->waktu)) Pukul {{ $ijin_ujian->konten->waktu }} @endif</span>
                                            @else
                                                <span class="badge badge-neutral">Belum diverifikasi</span>
                                            @endif
										</td>
										<td>
                                            <ol start="1" style="padding-left:5px;margin:0px">
												<li>{{ $ijin_ujian->konten->dosen[0]->nama }}</li>
												@if (is_array($ijin_ujian->konten->penguji))    
                                                
                                                @foreach ($ijin_ujian->konten->penguji as $penguji)
                                                    <li>{{$penguji->nama}}</li>
                                                @endforeach
											@endif
											</ol>
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

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
						<table class="table table-hover">
							<thead>
								<tr>
									<th width="5%">No</th>
									<th width="35%">Nama Mahasiswa</th>
									<th width="30%">Judul</th>
									{{-- <th width="15%">Tanggal</th> --}}
									<th width="30%">Ruang - Tanggal</th>
									<th width="10%">Penguji</th>
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
<<<<<<< HEAD
											@if(isset(json_decode($ijin_ujian->konten)->ruang) && isset(json_decode($ijin_ujian->konten)->waktu) && isset(json_decode($ijin_ujian->konten)->tanggal))
                          {{ json_decode($ijin_ujian->konten)->ruang }}-{{ json_decode($ijin_ujian->konten)->tanggal or null }}<br/>{{ json_decode($ijin_ujian->konten)->waktu }}
                      @else
                          -
                      @endif
=======
                                            @if ($ijin_ujian->konten->ruang != "''" && $ijin_ujian->konten->waktu != "''")
                                                {{ $ijin_ujian->konten->ruang }}-{{ $ijin_ujian->konten->tanggal or null }}<br/>{{ $ijin_ujian->konten->waktu }}
                                            @else
                                                -
                                            @endif
>>>>>>> eff57eba7a127da16d8f466f5fa6705a57b660af
										</td>
										<td>
                                            <ol start="1">
                                                <li>{{ $ijin_ujian->konten->dosen[0]->nama }}</li>
                                            </ol>
<<<<<<< HEAD
                                            @if (json_decode($ijin_ujian->konten)->penguji != '')
=======
                                            @if (is_array($ijin_ujian->konten->penguji))    
>>>>>>> eff57eba7a127da16d8f466f5fa6705a57b660af
                                                <ol start="2">
                                                @foreach ($ijin_ujian->konten->penguji as $penguji)
                                                    <li>{{$penguji->nama}}</li>
                                                @endforeach
                                                </ol>
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

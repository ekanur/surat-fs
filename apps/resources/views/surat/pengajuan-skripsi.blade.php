<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Pengajuan Judul Skripsi-{{ $permohonan_surat->mahasiswa->nama }}</title>
</head>
<body  @if($print == "print") onload="window.print();" @endif>
    <div id="header">
        <table width="100%" border="0">
            <tr>
                <td width="20%" style="text-align:right;padding:0px">
                    <img src="{{ asset("img/logo_um_warna.jpg")}}" alt="Universitas Negeri Malang" srcset="" width="90%" height="15%">
                </td>
                <td width="80%" style="text-align:center;padding:0px;vertical-align:text-top">

                        <h1 style="font-size:1em;margin:0px; font-weight: lighter">KEMENTERIAN RISET, TEKNOLOGI, DAN PENDIDIKAN TINGGI</h1>
                        <h1 style="font-size:1em;margin:0px; font-weight: lighter">UNIVERSITAS NEGERI MALANG (UM)</h1>
                        <h1 style="font-weight:bolder; font-size: 1em;margin:0px;">FAKULTAS SASTRA</h1>
                        Jalan Semarang 5, Malang 65145<br/>
                        Telepon/Fax: 0341-567475, 551312 Pesawat 235<br/>
                        Laman: <a href="https://www.um.ac.id" target="_blank">www.um.ac.id</a><br/>
                </td>
            </tr>
        </table>
    </div>
    <div id="body">
        <table width="86%" border="0" style="border-top:1px solid black; margin:auto">
            <tr>
                <td style="text-align:center; padding-bottom:30px" colspan="3">
                    <h1 style="font-weight:bolder; font-size: 1.25em;margin:0px;">PENGAJUAN JUDUL SKRIPSI</h1>
                    Mahasiswa Jurusan {{ $permohonan_surat->mahasiswa->jurusan }} Fakultas Sastra
                </td>
            </tr>

            <tr>
                <td>
                    NAMA & NO. HP
                </td>
				<td>
					: {{ $permohonan_surat->mahasiswa->nama }}
				</td>
				<td>
					No. HP ........................
				</td>
			</tr>
			<tr>
				<td>
					NIM/OFF
				</td>
				<td>
					: {{ $permohonan_surat->mahasiswa->nim }}
				</td>
				<td>
					Offering .......................
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>
					Tanda tangan
				</td>
				<td colspan="2">:</td>
			</tr>
			<tr>
				<td colspan="3">
					<table border="1" width="100%"  style="border-collapse:collapse;border-spacing:3px;margin-top:30px">
						<tr style="text-align:center; font-weight:bolder;">
							<td style="padding:10px">No</td>
							<td style="padding:10px" width="58%">Judul</td>
							<td style="padding:10px" width="52%">Pembimbing</td>
						</tr>
						<tr>
							<td style="vertical-align:top">
								01
							</td>
							<td style="vertical-align:top">
							@if($konten->judul_disetujui != '') {{ $konten->judul_disetujui }} @endif
							</td>
							<td>
								<ol start="I" style="margin-top:0; padding-left:18px">
									<li>
									@if(isset($konten->dosen_disetujui[0])) {{ $konten->dosen_disetujui[0]->nama }} @endif
									</li>
									<li>
									@if(isset($konten->dosen_disetujui[1])) {{ $konten->dosen_disetujui[1]->nama }} @endif
									</li>
								</ol>
							</td>
						</tr>
						<tr>
							<td>
								02
							</td>
							<td>

							</td>
							<td>

							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3">
				<table width="100%" border="0">
                            <tr>
								<td width="60%"></td>
								<td width="40%">
									<p>
									Malang, {{ $permohonan_surat->created_at->format("d") }} {{ bulan($permohonan_surat->created_at->format("m")) }} {{ $permohonan_surat->created_at->format("Y") }}
									</p>
									Ketua Jurusan
                  @if($permohonan_surat->siap_cetak)
                      <img id="tfoto" class="t s3_1" width="70%" height="10%" src="{{ Storage::url($pejabat["ttd"]) }}">

                  @endif<br>
									{{ $pejabat["nama"] }}<br/>
									NIP. {{ $pejabat["nip"] }}
								</td>
							</tr>
							<tr>
								<td colspan="2">
								Catatan :
								<p>Setelah diisi dan ditandatangani Kaprodi dan Kajur.<br/> Form ini difotocopy 1x, dan diserahkan :</p>
								<ol start=1 style="margin-top:0; padding-left:18px">
									<li>
									Lembar aslinya ke Kaprodi
									</li>
									<li>
									Satu lembar copyan ke Sekertaris Jurusan
									</li>
								</ol>
								</td>
							</tr>
                    </table>
				</td>
			</tr>
        </table>
    </div>
</body>
</html>

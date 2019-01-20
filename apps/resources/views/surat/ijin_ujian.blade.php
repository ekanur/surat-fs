<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Ijin Penelitian-{{ $verifikasi->mahasiswa->nama }}</title>
</head>
<body @if($print == "print") onload="window.print();" @endif>
    <div id="header">
        <table width="100%" border="0">
            <tr>
                <td width="20%" style="text-align:right;padding:0px">
                <img src="{{ asset("img/logo_um.jpg")}}" width="75%" height="30%">
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
        <table width="90%" border="0" style="border-top:1px solid black; margin:auto">
            <tr>
                <td width="15%">Nomor</td>
                <td>:</td>
                <td>{{ $verifikasi->permohonan_surat->updated_at->format("d") }}.{{ $verifikasi->permohonan_surat->updated_at->format("m") }}.{{ $verifikasi->permohonan_surat->nomor_surat }}/UN32.2.1/KM/{{ $verifikasi->permohonan_surat->updated_at->format("Y") }}<span style="float:right">{{ $verifikasi->permohonan_surat->updated_at->format("d") }} {{ bulan($verifikasi->permohonan_surat->updated_at->format("m")) }} {{ $verifikasi->permohonan_surat->updated_at->format("Y") }}  </span></td>
            </tr>
            <tr>
                <td>Lamp.</td>
                <td>:</td>
                <td>Teks Draft Skripsi</td>
            </tr>
            <tr>
                <td>Hal</td>
                <td>:</td>
                <td>Jadwal Ujian Skripsi</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style="vertical-align:top">
                    Kepada Yth.
                </td>
                <td style="vertical-align:top">:</td>
                <td>
                    
                </td>
            </tr>
            <tr>
                <td colspan="3">
                        <ul style="list-style:none; font-weight:bolder; margin-top:0; padding-left:20px">
                                <li>@if(isset($konten->dosen[0])) {{ $konten->dosen[0]->nama }} @endif</li>
                                <li>@if(isset($konten->penguji[0])) {{ $konten->penguji[0]->nama }} @endif</li>
                                <li>@if(isset($konten->penguji[1])) {{ $konten->penguji[1]->nama }} @endif</li>
                            </ul>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    Dengan hormat kami sampaikan nama mahasiswa yang menempuh matakuliah Skripsi Semester {{ semester() }} beserta jadwal ujiannya. Untuk itu kami mohon kehadiran para penguji pada waktu dan tempat yang telah tercantum pada surat ini.<br/><br/>
                    <h1 style="font-weight:bolder; font-size: 1.25em;margin:10px 0px; text-align:center">JADWAL UJIAN</h1>
                    <table width="100%" border="0">
                        <tr>
                            <td width="30%">Nama Mahasiswa (NIM)</td>
                            <td>:</td>
                            <td width="70%">{{ $verifikasi->mahasiswa->nama }} ({{ $verifikasi->mahasiswa->nim }})</td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">Judul Skripsi</td>
                            <td style="vertical-align:top">:</td>
                            <td style="vertical-align:top">@if($konten->judul != '') {{ $konten->judul }} @endif</td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">Pembimbing</td>
                            <td style="vertical-align:top">:</td>
                            <td style="vertical-align:top">@if(isset($konten->dosen[0])) {{ $konten->dosen[0]->nama }} @endif</td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">Penguji</td>
                            <td style="vertical-align:top">:</td>
                            <td style="vertical-align:top">
                                <ol style="margin-top:0;padding-left:20px">
                                    <li>@if(isset($konten->dosen[0])) {{ $konten->dosen[0]->nama }} @endif</li>
                                    <li>@if(isset($konten->penguji[0])) {{ $konten->penguji[0]->nama }} @endif</li>
                                    <li>@if(isset($konten->penguji[1])) {{ $konten->penguji[1]->nama }} @endif</li>
                                </ol>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                Waktu dan Tempat
                            </td>
                            <td style="vertical-align:top">:</td>
                            <td style="vertical-align:top">
                                @if(isset($konten->tanggal)) {{ $konten->tanggal->format("d")." ".bulan($konten->tanggal->format("m"))." ".$konten->tanggal->format("Y") }}  @endif, @if(isset($konten->waktu)) Pukul{{ $konten->waktu }} @endif <br/>
                                @if(isset($konten->ruang)) Ruang {{ $konten->ruang }} @endif
                            </td>
                        </tr>
                    </table>
                    <p>Demikian atas perhatiannya diucapkan terima kasih. </p>
                    <table width="100%" border="0">
                            <tr>
                                    <td width="60%"></td>
                                    <td width="40%">
                                        An. Ketua Jurusan {{ $verifikasi->mahasiswa->jurusan }} <br>Sekertaris Jurusan, <br/>
                                        @if($verifikasi->permohonan_surat->status == 'siap_cetak')
                                            <img id="tfoto" class="t s3_1" src="{{ Storage::url($sekjur["ttd"]) }}">
                                        @endif<br>
                                            {{ $sekjur["nama"] }}<br/>
                                            NIP {{ $sekjur["nip"] }}
                                    </td>
                                </tr>
                    </table>
                </td>
            </tr>
            
            <tr>
                <td colspan="3">
                    Tembusan :
                    <ol start="1" style="margin-top:0; padding-left:18px">
                        <li>Wakil Dekan 1</li>
                        <li>Kasubbag Pendidikan</li>
                        <li>Kasubbag Keuangan dan kepegawaian</li>
                        <li>Kasubbag Umum dan perlengkapan </li>
                        <li>Kalab. {{ $verifikasi->mahasiswa->jurusan }}</li>
                        <li>Mahasiswa yang bersangkutan</li>
                    </ol>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
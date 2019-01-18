<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Ijin Penelitian-{{ $verifikasi->mahasiswa->nama }}</title>
</head>
<body>
    <div id="header">
        <table width="100%" border="0">
            <tr>
                <td width="20%" style="text-align:right;padding:0px">
                <img src="{{ asset("img/logo_um.jpg") }}" alt="Universitas Negeri Malang" srcset="" width="75%" height="30%">
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
                <td>Nomor</td>
                <td>:</td>
                <td>{{ $verifikasi->permohonan_surat->updated_at->format("d") }}.{{ $verifikasi->permohonan_surat->updated_at->format("m") }}.{{ $verifikasi->permohonan_surat->nomor_surat }}/UN32.2.1/DK/{{ $verifikasi->permohonan_surat->updated_at->format("Y") }}<span style="float:right">{{ $verifikasi->permohonan_surat->updated_at->format("d") }} {{ bulan($verifikasi->permohonan_surat->updated_at->format("m")) }} {{ $verifikasi->permohonan_surat->updated_at->format("Y") }}  </span></td>
            </tr>
            <tr>
                <td>Hal</td>
                <td>:</td>
                <td>Izin mengadakan penelitian</td>
            </tr>
            <tr>
                <td style="vertical-align:top">
                    Yth.
                </td>
                <td style="vertical-align:top">:</td>
                <td>
                    <ul style="list-style:none; font-weight:bolder; margin-top:0; padding:0">
                        <li>{{ $konten->yth }} {{ $konten->nama_instansi }}</li>
                        <li>{{ $konten->alamat_instansi }}</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>
                    Dengan hormat kami beritahukan bahwa,<br/><br/>
                    <table>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{ $verifikasi->mahasiswa->nama }}</td>
                        </tr>
                        <tr>
                            <td>NIM</td>
                            <td>:</td>
                            <td>{{ $verifikasi->mahasiswa->nim }}</td>
                        </tr>
                    </table>
                    <p>adalah mahasiswa Fakultas Sastra Universitas Negeri Malang {{ $verifikasi->mahasiswa->jurusan }}, Program Studi {{ $verifikasi->mahasiswa->prodi }}.</p>
                    <p>Dalam rangka menyelesaikan {{ $konten->matakuliah }} pada semester {{ semester() }} yang bersangkutan memerlukan seperangkat data yang akan diperoleh melalui penelitian dengan ketentuan sebagai berikut.</p>
                    <table>
                        <tr>
                            <td style="vertical-align:top">Judul</td>
                            <td style="vertical-align:top">:</td>
                            <td>{{ $konten->judul_penelitian }}</td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">Populasi</td>
                            <td style="vertical-align:top">:</td>
                            <td>{{ $konten->populasi }}</td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">Tempat</td>
                            <td style="vertical-align:top">:</td>
                            <td>{{ $konten->tempat }}</td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">Waktu</td>
                            <td style="vertical-align:top">:</td>
                            <td>{{ $konten->tanggal_mulai->format("d") }} {{ bulan($konten->tanggal_mulai->format("m")) }} {{ $konten->tanggal_mulai->format("Y") }} s/d {{ $konten->tanggal_selesai->format("d") }} {{ bulan($konten->tanggal_selesai->format("m")) }} {{ $konten->tanggal_selesai->format("Y") }}</td>
                        </tr>
                    </table>

                    <p>
                        Untuk melaksanakan maksud tersebut, dengan hormat kami mohon Saudara berkenan memberikan izin penelitian kepada yang bersangkutan.
                    </p>
                    <p>
                        Atas perhatian dan kerja samanya, kami sampaikan terima kasih.
                    </p>
                    <table width="100%" border="0">
                            <tr>
                                    <td width="60%"></td>
                                    <td width="40%">
                                        a.n Dekan<br>Wakil Dekan 1, <br/>
                                        @if($verifikasi->permohonan_surat->status == 'siap_cetak')
                                            <img id="tfoto" class="t s3_1" src="{{ Storage::url($wd1["ttd"]) }}">
                                        @endif<br>
                                        <strong>
                                            {{ $wd1["nama"] }}<br/>
                                            NIP {{ $wd1["nip"] }}
                                        </strong>
                                    </td>
                                </tr>
                    </table>
                </td>
            </tr>
            
            <tr>
                <td colspan="3">
                    Tembusan :
                    <ol start="1" style="margin-top:0; padding-left:18px">
                        <li>Ketua Jurusan {{ $verifikasi->mahasiswa->jurusan }} FS UM</li>
                        <li>Yang bersangkutan</li>
                    </ol>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
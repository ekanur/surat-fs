<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Keterangan Aktif Kuliah-{{ $verifikasi->mahasiswa->nama }}</title>
</head>
<body  @if($print == "print") onload="window.print();" @endif>
    <div id="header">
        <table width="100%" border="0">
            <tr>
                <td width="20%" style="text-align:right;padding:0px">
                    <img src="{{ asset("img/logo_um.jpg")}}" alt="Universitas Negeri Malang" srcset="" width="75%" height="30%">
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
                <td style="text-align:center; padding-bottom:50px">
                    <h1 style="font-weight:bolder; font-size: 1.25em;margin:0px;">SURAT KETERANGAN</h1>
                    Nomor : {{ $verifikasi->permohonan_surat->updated_at->format("d") }}.{{ $verifikasi->permohonan_surat->updated_at->format("m") }}.{{ $verifikasi->permohonan_surat->nomor_surat or null }}/UN.32.2.1/KM/{{ $verifikasi->permohonan_surat->updated_at->format("Y") }}
                </td>
            </tr>
            
            <tr>
                <td>
                    Dekan Fakultas Sastra Universitas Negeri Malang menerangkan:
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
                    <p>pada semester {{ semester() }} terdaftar sebagai mahasiswa Program Studi  {{ $verifikasi->mahasiswa->prodi }}, Jurusan {{ $verifikasi->mahasiswa->jurusan }} Universitas Negeri Malang </p>
                    <p>Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.</p>

                    <table width="100%" border="0">
                            <tr>
                                    <td width="60%"></td>
                                    <td width="40%">
                                        <p>
                                        {{ $verifikasi->permohonan_surat->updated_at->format("d") }} {{ bulan($verifikasi->permohonan_surat->updated_at->format("m")) }} {{ $verifikasi->permohonan_surat->updated_at->format("Y") }}
                                        </p>
                                        a.n Dekan<br>Wakil Dekan 1, <br/>
                                        @if($verifikasi->permohonan_surat->status == 'siap_cetak')
                                            <img id="tfoto" class="t s3_1" src="{{ Storage::url($wd1["ttd"]) }}">
                                        @endif<br>
                                        <strong>
                                            {{ $wd1["nama"] }}
                                            
                                        </strong><br/>
                                        NIP {{ $wd1["nip"] }}
                                    </td>
                                </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
<?php

use Illuminate\Database\Seeder;

class LayananSuratTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("layanan_surat")->insert([
            "id" => 1,
            "judul" => "Layanan Surat Aktif Kuliah",
            "kode_layanan" => "aktif-kuliah"
        ]);

        DB::table("layanan_surat")->insert([
            "id" => 2,
            "judul" => "Layanan Surat Ijin Penelitian",
            "kode_layanan" => "ijin-penelitian"
        ]);

        DB::table("layanan_surat")->insert([
            "id" => 3,
            "judul" => "Layanan Surat Ijin Observasi",
            "kode_layanan" => "ijin-observasi"
        ]);

        DB::table("layanan_surat")->insert([
            "id" => 4,
            "judul" => "Layanan Surat Pengajuan Skripsi",
            "kode_layanan" => "pengajuan-skripsi"
        ]);

        DB::table("layanan_surat")->insert([
            "id" => 5,
        	"judul" => "Layanan Surat Ijin Ujian Skripsi",
        	"kode_layanan" => "ijin-ujian"
        ]);
    }
}

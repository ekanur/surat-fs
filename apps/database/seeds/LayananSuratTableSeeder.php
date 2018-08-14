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
        	"judul" => "Layanan Surat Aktif Kuliah",
        	"kode_layanan" => "aktif_kuliah"
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class VerifikatorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("verifikator")->insert([
        	"layanan_surat_id" => 1,
        	"user_tipe" => "wd1",
        	"urutan" => 1
        ]);

        DB::table("verifikator")->insert([
            "layanan_surat_id" => 2,
            "user_tipe" => "wd1",
            "urutan" => 2
        ]);

        DB::table("verifikator")->insert([
            "layanan_surat_id" => 2,
            "user_tipe" => "sekjur",
            "urutan" => 1
        ]);

        DB::table("verifikator")->insert([
            "layanan_surat_id" => 3,
            "user_tipe" => "sekjur",
            "urutan" => 1
        ]);

        DB::table("verifikator")->insert([
            "layanan_surat_id" => 3,
            "user_tipe" => "wd1",
            "urutan" => 2
        ]);

        DB::table("verifikator")->insert([
            "layanan_surat_id" => 4,
            "user_tipe" => "kajur",
            "urutan" => 1
        ]);

    }
}

<?php

use Illuminate\Database\Seeder;

class MahasiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("mahasiswa")->insert([
        	"nim" => "140222605174",
        	"password" => bcrypt("140222605174"),
        	"nama" => "ARDYATAMA SAPUTRA",
        	"jurusan" => "sastra_inggris",
        	"prodi" => "sing",

        ]);

        DB::table("mahasiswa")->insert([
        	"nim" => "130222614329",
        	"password" => bcrypt("130222614329"),
        	"nama" => "ARUM GUMELAR",
        	"jurusan" => "sastra_inggris",
        	"prodi" => "sing",
        ]);
    }
}

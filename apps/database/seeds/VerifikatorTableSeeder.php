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
        	"user_id" => 2,
        	"urutan" => 1
        ]);
    }
}

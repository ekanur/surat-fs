<?php

use Illuminate\Database\Seeder;

class DosenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("dosen")->insert([
        	"nama" => "Admin FS",
        	"nip" => "1111111",
        	"jurusan" => "sastra_inggris"
        ]);

        DB::table("dosen")->insert([
        	"nama" => "Prof. Utami Widiati, M.A., Ph.D.",
        	"nip" => "196508131990022001",
        	"jurusan" => "sastra_inggris"
        ]);
    }
}

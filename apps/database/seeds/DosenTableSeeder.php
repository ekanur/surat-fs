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

        DB::table("dosen")->insert([
            "nama" => "Dr. Primardiana H.W., M.Pd.",
            "nip" => "196409171988022001",
            "jurusan" => "sastra_inggris"
        ]);

        DB::table("dosen")->insert([
            "nama" => "Dr. Roekhan, M.Pd",
            "nip" => "196105041987011001",
            "jurusan" => "sastra_inggris"
        ]);

        DB::table("dosen")->insert([
            "nama" => "Dr. H. Kholisin, M.Hum",
            "nip" => "196512091990021001",
            "jurusan" => "sastra_arab"
        ]);

        DB::table("dosen")->insert([
            "nama" => "Prof. Dr. Heri Suwignyo, M.Pd",
            "nip" => "195905211988021001",
            "jurusan" => "sastra_indonesia"
        ]);

        DB::table("dosen")->insert([
            "nama" => "Dr. Johannes A. P., M.Pd, M.Ed.",
            "nip" => "195810281986011001",
            "jurusan" => "sastra_inggris"
        ]);

        DB::table("dosen")->insert([
            "nama" => "Dr. Hanik Mahliatussikah, S.Ag, M.Hum",
            "nip" => "197404271998032002",
            "jurusan" => "sastra_arab"
        ]);

        DB::table("dosen")->insert([
            "nama" => "Dr. Rizman, M.Pd",
            "nip" => "196109251988021001",
            "jurusan" => "sastra_jerman"
        ]);

        DB::table("dosen")->insert([
        	"nama" => "Dr. Hariyanto, M.Hum",
        	"nip" => "195805011987011001",
        	"jurusan" => "seni_desain"
        ]);
    }
}

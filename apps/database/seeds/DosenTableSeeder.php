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
            "id" => 1,
        	"nama" => "Admin FS",
        	"nip" => "1111111",
        	"jurusan" => "sastra_inggris"
        ]);

        DB::table("dosen")->insert([
            "id" => 2,
            "nama" => "Prof. Utami Widiati, M.A., Ph.D.",
            "nip" => "196508131990022001",
            "jurusan" => "sastra_inggris"
        ]);

        DB::table("dosen")->insert([
            "id" => 3,
            "nama" => "Dr. Primardiana H.W., M.Pd.",
            "nip" => "196409171988022001",
            "jurusan" => "sastra_inggris"
        ]);

        DB::table("dosen")->insert([
            "id" => 4,
            "nama" => "Dr. Roekhan, M.Pd",
            "nip" => "196105041987011001",
            "jurusan" => "sastra_inggris"
        ]);

        DB::table("dosen")->insert([
            "id" => 5,
            "nama" => "Dr. H. Kholisin, M.Hum",
            "nip" => "196512091990021001",
            "jurusan" => "sastra_arab"
        ]);

        DB::table("dosen")->insert([
            "id" => 6,
            "nama" => "Prof. Dr. Heri Suwignyo, M.Pd",
            "nip" => "195905211988021001",
            "jurusan" => "sastra_indonesia"
        ]);

        DB::table("dosen")->insert([
            "id" => 7,
            "nama" => "Dr. Johannes A. P., M.Pd, M.Ed.",
            "nip" => "195810281986011001",
            "jurusan" => "sastra_inggris"
        ]);

        DB::table("dosen")->insert([
            "id" => 8,
            "nama" => "Dr. Hanik Mahliatussikah, S.Ag, M.Hum",
            "nip" => "197404271998032002",
            "jurusan" => "sastra_arab"
        ]);

        DB::table("dosen")->insert([
            "id" => 9,
            "nama" => "Dr. Rizman, M.Pd",
            "nip" => "196109251988021001",
            "jurusan" => "sastra_jerman"
        ]);

        DB::table("dosen")->insert([
            "id" => 10,
            "nama" => "Dr. Hariyanto, M.Hum",
            "nip" => "195805011987011001",
            "jurusan" => "seni_desain"
        ]);

        DB::table("dosen")->insert([
            "id" => 11,
            "nama" => "Dr. Martutik, M.Pd",
            "nip" => "196308271987012001",
            "jurusan" => "sastra_indonesia"
        ]);

        DB::table("dosen")->insert([
            "id" => 12,
            "nama" => "Dr. Suharyadi, S.Pd, M.Pd",
            "nip" => "197910172010121003",
            "jurusan" => "sastra_inggris"
        ]);

        DB::table("dosen")->insert([
            "id" => 13,
            "nama" => "Ali Ma'sum, S.Pd, M.A.",
            "nip" => "197908262005011002",
            "jurusan" => "sastra_arab"
        ]);

        DB::table("dosen")->insert([
            "id" => 14,
            "nama" => "Iwa Sobara, S.Pd, M.A.",
            "nip" => "198204282006041001",
            "jurusan" => "sastra_jerman"
        ]);

        DB::table("dosen")->insert([
            "id" => 15,
            "nama" => "Drs. Sumarwahyudi, M.Sn",
            "nip" => "196205191992031001",
            "jurusan" => "seni_desain"
        ]);
    }
}

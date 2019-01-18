<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            "id" => 1,
        	"username" => "admin",
        	"email" => "admin@um.ac.id",
        	"password" => bcrypt("admin"),
        	"dosen_id" => 1,
        	"tipe" => "admin"
        ]);

        DB::table("users")->insert([
            "id" => 2,
            "username" => "dekan",
            "email" => "dekan.fs@um.ac.id",
            "password" => bcrypt("123456"),
            "dosen_id" => 2,
            "tipe" => "dekan"
        ]);

        DB::table("users")->insert([
            "id" => 3,
            "username" => "wd1",
            "email" => "wd1.fs@um.ac.id",
            "password" => bcrypt("123456"),
            "dosen_id" => 3,
            "tipe" => "wd1"
        ]);

        DB::table("users")->insert([
            "id" => 4,
            "username" => "wd2",
            "email" => "wd2.fs@um.ac.id",
            "password" => bcrypt("123456"),
            "dosen_id" => 4,
            "tipe" => "wd2"
        ]);

        DB::table("users")->insert([
            "id" => 5,
            "username" => "wd3",
            "email" => "wd3.fs@um.ac.id",
            "password" => bcrypt("123456"),
            "dosen_id" => 5,
            "tipe" => "wd3"
        ]);

        DB::table("users")->insert([
            "id" => 6,
            "username" => "indonesia",
            "email" => "fs@um.ac.id",
            "password" => bcrypt("123456"),
            "dosen_id" => 6,
            "tipe" => "kajur"
        ]);

        DB::table("users")->insert([
            "id" => 7,
            "username" => "inggris",
            "email" => "fs@um.ac.id",
            "password" => bcrypt("123456"),
            "dosen_id" => 7,
            "tipe" => "kajur"
        ]);

        DB::table("users")->insert([
            "id" => 8,
            "username" => "arab",
            "email" => "fs@um.ac.id",
            "password" => bcrypt("123456"),
            "dosen_id" => 8,
            "tipe" => "kajur"
        ]);

        DB::table("users")->insert([
            "id" => 9,
            "username" => "jerman",
            "email" => "fs@um.ac.id",
            "password" => bcrypt("123456"),
            "dosen_id" => 9,
            "tipe" => "kajur"
        ]);

        DB::table("users")->insert([
            "id" => 10,
            "username" => "seni",
            "email" => "fs@um.ac.id",
            "password" => bcrypt("123456"),
            "dosen_id" => 10,
            "tipe" => "kajur"
        ]);
    }
}

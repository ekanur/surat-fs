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
        	"username" => "admin",
        	"email" => "admin@um.ac.id",
        	"password" => bcrypt("admin"),
        	"dosen_id" => 1,
        	"tipe" => "admin"
        ]);

        DB::table("users")->insert([
            "username" => "dekan",
            "email" => "dekan.fs@um.ac.id",
            "password" => bcrypt("123456"),
            "dosen_id" => 2,
            "tipe" => "dekan"
        ]);

        DB::table("users")->insert([
        	"username" => "wd1",
        	"email" => "wd1.fs@um.ac.id",
        	"password" => bcrypt("123456"),
        	"dosen_id" => 3,
        	"tipe" => "wd1"
        ]);
    }
}

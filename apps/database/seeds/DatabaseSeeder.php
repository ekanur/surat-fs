<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DosenTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(LayananSuratTableSeeder::class);
        $this->call(VerifikatorTableSeeder::class);
        $this->call(MahasiswaTableSeeder::class);
    }
}

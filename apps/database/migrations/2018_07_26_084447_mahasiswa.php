<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nim", 15)->uniqe();
            $table->string("nama", 50);
            $table->enum("jurusan", ['sastra_indonesia','sastra_inggris','sastra_arab','sastra_jerman','seni_desain']);
            $table->enum("prodi", ["pind", "sind", "d3_perpus", "s1_perpus", "ping", "sing", "arab", "jerman", "mandarin", "psr", "pstm", "dkv", "game_animation"]);
            $table->integer("pa_id")->nullable();
            $table->timestamps();
            $table->softDeletes();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

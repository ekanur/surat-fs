<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Verifikasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifikasi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("permohonan_surat_id");
            $table->integer("mahasiswa_id");
            $table->integer("user_id");
            $table->enum("status", ["setuju", "tolak", "diajukan"]);
            $table->string("catatan", 200)->nullable();
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PermohonanSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan_surat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("mahasiswa_id");
            $table->integer("layanan_surat_id");
            $table->enum("status", ["verifikasi", "siap_cetak"]);
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

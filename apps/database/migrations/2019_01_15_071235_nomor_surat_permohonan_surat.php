<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NomorSuratPermohonanSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("permohonan_surat", function(Blueprint $table){
            $table->integer("nomor_surat")->after("layanan_surat_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permohonan_surat', function(Blueprint $table){
            $table->dropColumn('nomor_surat');
        });
    }
}

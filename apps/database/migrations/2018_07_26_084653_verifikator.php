<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Verifikator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifikator', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("layanan_surat_id");
            $table->enum("user_tipe", ["admin", "dekan", "kajur", "wd1", "wd2", "wd3", "sekjur"]);
            $table->integer("urutan");
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

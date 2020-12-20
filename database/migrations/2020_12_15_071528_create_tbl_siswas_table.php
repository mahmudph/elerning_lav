<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_siswas', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('id_user')->nullable();
            $table->string('nama_siswa', 50);
            $table->string('nis');
            $table->smallInteger('gender');
            $table->string('nomer_hp', 13);
            $table->date('tgl_lahir', 6);
            $table->string('tempat_lahir', 25);
            $table->text('alamat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_siswas');
    }
}

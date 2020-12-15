<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_guru', 50);
            $table->string('nip', 16);
            $table->smallInteger('gender');
            $table->string('nomer_hp', 13);
            $table->date('tgl_lahir', 6);
            $table->string('tempat_lahir', 25);
            $table->text('alamat')->nullable();
            $table->string('lulusan');
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
        Schema::dropIfExists('gurus');
    }
}

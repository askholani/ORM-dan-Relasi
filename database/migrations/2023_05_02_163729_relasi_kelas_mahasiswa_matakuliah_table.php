<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('mahasiswa_matakuliah',function (Blueprint $table) {
            $table->foreign('matakuliah_id')->references('id')->on('matakuliah');
        });

        Schema::table('mahasiswa_matakuliah', function (Blueprint $table) {
            $table->foreign('mahasiswa_id')->references('Nim')->on('mahasiswas'); 
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
        // Schema::table('mahasiswas', function (Blueprint $table) {
        //     $table->string('kelas');
        //     $table->dropForeign(['kelas_id']);
        // });
    }
};
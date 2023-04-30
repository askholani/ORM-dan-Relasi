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
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->integer('nim')->unsigned()->primary();
            $table->string('name', 100);
            $table->string('kelas', 4);
            $table->string('jurusan', 100);
            $table->string('no_hp', 15);
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
        // Schema::dropIfExists('mahasiswas');
    }
};
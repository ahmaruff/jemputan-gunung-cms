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
        Schema::create('pakets', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('thumbnail')->nullable();
            $table->string('penjemputan');
            $table->text('deskripsi')->nullable();
            $table->string('durasi');
            $table->string('rencana_perjalanan')->nullable();
            $table->float('harga',14,2);
            $table->integer('minimal_pax');
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
        Schema::dropIfExists('pakets');
    }
};

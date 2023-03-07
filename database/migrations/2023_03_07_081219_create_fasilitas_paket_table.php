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
        Schema::create('fasilitas_paket', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paket_id');
            $table->unsignedBigInteger('fasilitas_id');
            $table->timestamps();

            $table->foreign('paket_id')->references('id')->on('pakets')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('fasilitas_id')->references('id')->on('fasilitas')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fasilitas_paket');
    }
};

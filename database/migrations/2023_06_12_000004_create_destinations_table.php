<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->integer('id_category');
            $table->string('name');
            $table->text('description');
            $table->text('location');
            $table->string('contact');
            $table->string('jam_operasional');
            $table->integer('harga');
            $table->text('fasilitas');
            $table->text('menu');
            $table->string('tipe_kamar');
            $table->integer('status');
            $table->string('image');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('destinations');
    }
};

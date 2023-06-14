<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('user_destinations', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_destination');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_destinations');
    }
};

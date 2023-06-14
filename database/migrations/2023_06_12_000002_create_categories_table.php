<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id_categories');
            // $table->primary('id_categories');
            // $table->increments('id_categories');
            $table->string('categories_name');
            $table->string('images');
            $table->text('description');
            $table->enum('status',['Aktif','Tidak Aktif']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
};

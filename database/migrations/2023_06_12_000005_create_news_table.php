<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id_news');
            // $table->primary('id_news');
            // $table->increments('id_news');
            $table->integer('id_users');
            $table->string('title');
            $table->text('news');
            $table->text('news_image');
            $table->enum('status',['Aktif','Tidak Aktif']);
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('news');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            //TODO urlは日本語が通るのでそれでURLがエラーにならないかを確認する
            $table->string('url', 255);
            $table->string('thumbnail', 500)->nullable();
            $table->string('content01', 500)->nullable();
            $table->string('image01', 500)->nullable();
            $table->string('content02', 500)->nullable();
            $table->string('image02', 500)->nullable();
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
        Schema::dropIfExists('news');
    }
}

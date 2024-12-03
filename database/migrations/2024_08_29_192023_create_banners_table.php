<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('banners1')->nullable();
            $table->string('banners2')->nullable();
            $table->string('banners3')->nullable();
            $table->string('banners4')->nullable();
            $table->string('banners5')->nullable();
            $table->string('banners6')->nullable();
            $table->string('banners7')->nullable();
            $table->string('banners8')->nullable();
            $table->string('banners9')->nullable();
            $table->string('banners10')->nullable();
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
        Schema::dropIfExists('banners');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home', function (Blueprint $table) {
            $table->id();
            $table->string('heading1')->nullable();
            $table->string('heading2')->nullable();
            $table->string('heading3')->nullable();
            $table->string('heading4')->nullable();
            $table->string('heading5')->nullable();
            $table->string('heading6')->nullable();
            $table->string('heading7')->nullable();
            $table->string('heading8')->nullable();
            $table->string('heading9')->nullable();
            $table->string('heading10')->nullable();
            $table->string('heading11')->nullable();
            $table->string('heading12')->nullable();
            $table->string('heading13')->nullable();
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
        Schema::dropIfExists('home');
    }
}

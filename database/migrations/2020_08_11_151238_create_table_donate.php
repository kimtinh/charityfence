<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDonate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donate', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('price');
            $table->string('message',255);
            $table->string('phone');
            $table->string('name');
            $table->string('email');
            $table->unsignedBigInteger('campaign_id');
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
        Schema::dropIfExists('donate');
    }
}

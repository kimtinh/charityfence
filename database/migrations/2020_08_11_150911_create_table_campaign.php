<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCampaign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->boolean('status')->default(false);
            $table->text('content');
            $table->text('description');
            $table->text('images')->nullable();
            $table->date('date_start');
            $table->date('date_end');
            $table->string('bank_account')->nullable();
            $table->unsignedBigInteger('amount');
            $table->unsignedBigInteger('price_total')->nullable()->default(0);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('difficult_situation_id')->nullable();
            $table->unsignedBigInteger('category_id');
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
        Schema::dropIfExists('campaign');
    }
}

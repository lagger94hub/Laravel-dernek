<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('content_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('ip', 50)->nullable();
            $table->string('subject', 50)->nullable();
            $table->string('review', 50)->nullable();
            $table->string('note', 300)->nullable();
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
        Schema::dropIfExists('reviews');
    }
}

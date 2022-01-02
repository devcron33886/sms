<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mentor_id');
            $table->foreign('mentor_id', 'mentor_fk_5274446')->references('id')->on('users');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id', 'category_fk_5274350')->references('id')->on('categories');
            $table->string('title');
            $table->longText('description');
            $table->longText('answer')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by', 'created_by_fk_5274356')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}

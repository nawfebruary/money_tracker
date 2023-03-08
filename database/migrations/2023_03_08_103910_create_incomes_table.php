<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->integer('id')->unsigned()->index();
            $table->unsignedBigInteger('amount');
            $table->integer('category_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('note')->nullable();
            $table->string('schedule')->nullable();
            $table->string('flash')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');               
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
        Schema::dropIfExists('incomes');
    }
};

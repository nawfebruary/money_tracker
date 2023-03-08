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
        Schema::dropIfExists('users');
        Schema::create('users', function($table) {
            $table->integer('id')->unsigned()->index();
            $table->string('member_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('type')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('password')->nullable();
            $table->datetime('new_date_of_birth')->nullable();
            $table->integer('role_id')->unsigned()->nullable();
            $table->string('gender')->nullable();
            $table->string('webuser')->nullable();
            $table->string('udid')->nullable();
            $table->integer('active')->nullable();
            $table->integer('app_version')->nullable();
            $table->integer('platform')->nullable();
            $table->string('user_kind')->nullable();
            $table->string('category_order')->nullable();
            $table->string('encoding')->nullable();
            $table->timestamps();
            $table->datetime('deleted_at')->nullable(); 
            $table->foreign('role_id')->references('id')->on('roles');
            $table->rememberToken();               
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('user_information');
    }
};

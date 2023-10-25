<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('name');
            $table->string('contactNumber')->unique();
            $table->boolean('account_is_verified')->default(false);
            $table->boolean('account_is_deleted')->default(false);
            $table->boolean('account_is_active')->default(true);
            $table->unsignedBigInteger('role_id')->default(0);
            $table->string('password');
            $table->date('date_created')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

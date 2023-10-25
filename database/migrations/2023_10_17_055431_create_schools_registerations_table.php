<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsRegisterationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools_registerations', function (Blueprint $table) {
            $table->increments('schoolregister_id');
            $table->unsignedBigInteger('provinceId')->default(0);
            $table->unsignedBigInteger('school_id')->default(0);
            $table->unsignedBigInteger('cityId')->default(0);
            $table->unsignedBigInteger('user_id')->default(0);
            $table->string('school_logo')->nullable();
            $table->boolean('school_register_isDeleted')->default(0);
            $table->boolean('school_register_isActive')->default(0);
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
        Schema::dropIfExists('schools_registerations');
    }
}

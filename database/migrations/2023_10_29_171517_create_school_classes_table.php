<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_classes', function (Blueprint $table) {
            $table->increments('school_class_id');
            $table->unsignedBigInteger('school_id')->default(0);
            $table->unsignedBigInteger('schoolregister_id')->default(0);
            $table->unsignedBigInteger('user_id')->default(0);
            $table->boolean('school_class_isActive')->default(true);
            $table->boolean('school_class_isDeleted')->default(false);
            $table->string('school_class_name')->nullable();
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
        Schema::dropIfExists('school_classes');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchooldepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schooldepartments', function (Blueprint $table) {
            $table->increments('school_department_id');

            $table->unsignedBigInteger('school_id')->default(0);
            $table->unsignedBigInteger('schoolregister_id')->default(0);
            $table->unsignedBigInteger('user_id')->default(0);

            $table->string('school_department_name')->nullable();
            $table->boolean('school_department_isActive')->default(true);
            $table->boolean('school_department_isDeleted')->default(false);




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
        Schema::dropIfExists('schooldepartments');
    }
}

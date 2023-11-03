<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolBookTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_titles', function (Blueprint $table) {

            $table->increments('school_titles_id');

            $table->unsignedBigInteger('school_id')->default(0);
            $table->unsignedBigInteger('schoolregister_id')->default(0);
            $table->unsignedBigInteger('user_id')->default(0);

            $table->string('school_title_name')->nullable();
            $table->boolean('school_titles_isActive')->default(true);
            $table->boolean('school_titles_isDeleted')->default(false);


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
        Schema::dropIfExists('school_titles');
    }
}

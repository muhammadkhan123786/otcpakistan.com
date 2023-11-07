<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolclassPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schoolclass_prices', function (Blueprint $table) {

            $table->increments('school_class_price_id');

            $table->unsignedBigInteger('school_id')->default(0);
            $table->unsignedBigInteger('schoolregister_id')->default(0);
            $table->unsignedBigInteger('user_id')->default(0);

            $table->boolean('school_price_isActive')->default(true);
            $table->boolean('school_price_isDeleted')->default(false);

            $table->unsignedBigInteger('school_class_id')->default(0);
            $table->unsignedBigInteger('school_department_id')->default(0);
            $table->unsignedBigInteger('school_titles_id')->default(0);
            $table->unsignedBigInteger('school_publisher_id')->default(0);


            $table->float('school_unit_price',8,2)->nullable();
            $table->float('school_cost_price',8,2)->nullable();
            $table->float('school_discount_price',8,2)->nullable();
            $table->float('school_qty',8,2)->nullable();




            $table->string('subject_image')->nullable();


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
        Schema::dropIfExists('schoolclass_prices');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolpublishersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schoolpublishers', function (Blueprint $table) {

            $table->increments('school_publisher_id');

            $table->unsignedBigInteger('school_id')->default(0);
            $table->unsignedBigInteger('schoolregister_id')->default(0);
            $table->unsignedBigInteger('user_id')->default(0);

            $table->boolean('school_publisher_isActive')->default(true);
            $table->boolean('school_publisher_isDeleted')->default(false);


            $table->string('school_publisher_name')->nullable();
            $table->string('school_publisher_address')->nullable();
            $table->string('school_publisher_contact_number')->nullable();
            $table->string('school_publisher_whatsapp_number')->nullable();


            $table->string('school_publisher_website')->nullable();
            $table->string('school_publisher_email_id')->nullable();


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
        Schema::dropIfExists('schoolpublishers');
    }
}

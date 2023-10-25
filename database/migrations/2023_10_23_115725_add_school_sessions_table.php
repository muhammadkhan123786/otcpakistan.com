<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSchoolSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('school_sessions', function (Blueprint $table) {
            //
            $table->increments('id')->change();
            $table->renameColumn('id', 'school_sessions_id');
            $table->unsignedBigInteger('school_id')->default(0);
            $table->unsignedBigInteger('schoolregister_id')->default(0);
            $table->unsignedBigInteger('user_id')->default(0);
            $table->boolean('school_session_isActive')->default(true);
            $table->boolean('school_session_isDeleted')->default(false);
            $table->string('school_session_name')->nullable();
            $table->date('school_session_startDate')->nullable();
            $table->date('school_session_endDate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('school_sessions', function (Blueprint $table) {
            //
            $table->dropColumn('id');
            $table->dropColumn('id');
            $table->dropColumn('school_id');
            $table->dropColumn('schoolregister_id');
            $table->dropColumn('user_id');
            $table->dropColumn('school_session_isActive');
            $table->dropColumn('school_session_isDeleted');
            $table->dropColumn('school_session_name');
            $table->dropColumn('school_session_startDate');
            $table->dropColumn('school_session_endDate');


        });
    }
}

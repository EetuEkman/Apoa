<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::table('users', function(Blueprint $table)
        {
            $table->foreign('role_id')->references('id')->on('roles');
        });

        Schema::table('assessments', function(Blueprint $table)
        {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('responses', function(Blueprint $table)
        {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('responses', function(Blueprint $table)
        {
            $table->foreign('assessment_id')->references('id')->on('assessments');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table)
        {
           $table->dropForeign(['role_id']);
        });

        Schema::table('assessments', function(Blueprint $table)
        {
            $table->dropForeign(['user_id']);
        });

        Schema::table('responses', function(Blueprint $table)
        {
            $table->dropForeign(['user_id']);
        });

        Schema::table('responses', function(Blueprint $table)
        {
            $table->dropForeign(['assessment_id']);
        });

        Schema::disableForeignKeyConstraints();
    }
}

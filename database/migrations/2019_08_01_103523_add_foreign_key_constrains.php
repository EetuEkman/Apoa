<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyConstrains extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assessment_group', function(Blueprint $table)
        {
            $table->foreign('assessment_id')->references('id')->on('assessments');
        });

        Schema::table('assessment_group', function(Blueprint $table)
        {
            $table->foreign('group_id')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assessment_group', function(Blueprint $table)
        {
            $table->dropForeign(['assessment_id']);
        });

        Schema::table('assessment_group', function(Blueprint $table)
        {
            $table->dropForeign(['group_id']);
        });
    }
}

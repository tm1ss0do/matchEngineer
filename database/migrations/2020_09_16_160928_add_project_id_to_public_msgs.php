<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProjectIdToPublicMsgs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('public_msgs', function (Blueprint $table) {
            //
            DB::statement('DELETE FROM public_msgs');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('public_msgs', function (Blueprint $table) {
          //
            $table->dropForeign(['project_id']);
            $table->dropColumn('project_id');
        });
    }
}

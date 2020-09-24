<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBoardIdToDirectMsgs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('direct_msgs', function (Blueprint $table) {
            //
            DB::statement('DELETE FROM public_msgs');
            $table->unsignedBigInteger('board_id');
            $table->foreign('board_id')->references('id')->on('direct_msgs_boards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('direct_msgs', function (Blueprint $table) {
            //
            $table->dropForeign(['board_id']);
            $table->dropColumn('board_id');
        });
    }
}

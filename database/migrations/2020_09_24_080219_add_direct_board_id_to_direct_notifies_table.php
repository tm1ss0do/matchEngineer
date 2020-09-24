<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDirectBoardIdToDirectNotifiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('direct_notifies', function (Blueprint $table) {
            //
            DB::statement('DELETE FROM public_notifies');
            $table->unsignedBigInteger('direct_board_id');
            $table->foreign('direct_board_id')->references('id')->on('direct_msgs_boards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('direct_notifies', function (Blueprint $table) {
            //
            $table->dropForeign(['direct_board_id']);
            $table->dropColumn('direct_board_id');
        });
    }
}

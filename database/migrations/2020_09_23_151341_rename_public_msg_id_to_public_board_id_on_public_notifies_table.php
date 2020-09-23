<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenamePublicMsgIdToPublicBoardIdOnPublicNotifiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('public_notifies', function (Blueprint $table) {
            //
            $table->renameColumn('public_board_id', 'public_board_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('public_notifies', function (Blueprint $table) {
            //
            $table->renameColumn('public_board_id', 'public_board_id');
        });
    }
}

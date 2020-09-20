<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeRecruiterIdToRecieverIdOnDirectMsgsBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('direct_msgs_boards', function (Blueprint $table) {
            //
            $table->renameColumn('reciever_id', 'reciever_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('direct_msgs_boards', function (Blueprint $table) {
            //
            $table->renameColumn('reciever_id', 'reciever_id');
        });
    }
}

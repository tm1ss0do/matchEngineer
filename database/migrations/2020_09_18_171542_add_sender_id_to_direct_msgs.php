<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSenderIdToDirectMsgs extends Migration
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
            DB::statement('DELETE FROM direct_msgs');
            $table->unsignedBigInteger('sender_id');
            $table->foreign('sender_id')->references('id')->on('users');
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
            $table->dropForeign(['sender_id']);
            $table->dropColumn('sender_id');
        });
    }
}

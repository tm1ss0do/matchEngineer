<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMsgIdToPublicNotifies extends Migration
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
            DB::statement('DELETE FROM public_notifies');
            // $table->unsignedBigInteger('public_board_id')->nullable();
            $table->unsignedBigInteger('public_board_id');
            $table->foreign('public_board_id')->references('id')->on('projects');
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
            $table->dropForeign(['public_board_id']);
            $table->dropColumn('public_board_id');
        });
    }
}

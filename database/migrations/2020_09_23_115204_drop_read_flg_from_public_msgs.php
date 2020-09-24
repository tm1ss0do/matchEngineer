<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropReadFlgFromPublicMsgs extends Migration
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
            $table->dropColumn('read_flg');
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
            $table->boolean('read_flg');
        });
    }
}

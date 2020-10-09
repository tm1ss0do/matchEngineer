<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicMsgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_msgs', function (Blueprint $table) {
            // $table->id();
            // $table->datetime('send_date');
            // $table->string('content',1000);
            // $table->boolean('read_flg');
            // $table->timestamps();
            //
            //  $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('public_msgs');
    }
}

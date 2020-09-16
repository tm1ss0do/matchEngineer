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
            $table->id();
            $table->datetime('send_date');
            $table->string('content',1000);
            // $table->unsignedBigInteger('sender_id');
            // $table->foreign('sender_id')->references('id')->on('users');
            // $table->unsignedBigInteger('project_id');
            // $table->foreign('project_id')->references('id')->on('projects');
            $table->boolean('read_flg');
            $table->timestamps();
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

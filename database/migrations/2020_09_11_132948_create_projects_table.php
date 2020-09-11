<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_title', 100);
            $table->boolean('project_status');
            $table->string('project_type');
            $table->dateTime('project_reception_end');
            $table->integer('project_max_amount');
            $table->integer('project_mini_amount');
            $table->string('project_detail_desc',1000);
            $table->unsignedBigInteger('applicant_id');
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
        Schema::dropIfExists('projects');
    }
}

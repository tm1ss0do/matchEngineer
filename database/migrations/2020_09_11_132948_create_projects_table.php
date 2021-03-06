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
            $table->dateTime('project_reception_end')->nullable();
            $table->integer('project_max_amount')->nullable();
            $table->integer('project_mini_amount')->nullable();
            $table->string('project_detail_desc',2000);
            $table->timestamps();

             $table->softDeletes();
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

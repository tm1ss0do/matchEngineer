<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile_icon')->nullable();
            $table->string('self_introduction',1000)->nullable();
            // $table->boolean('delete_flg');
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();

            // // 論理削除されていれば NULL， されていなければ 1 になる生成列を定義
            // $table->boolean('exist')->nullable()->storedAs('case when deleted_at is null then 1 else null end');
            //
            // // 複合ユニーク制約
            // $table->unique(['email', 'exist']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

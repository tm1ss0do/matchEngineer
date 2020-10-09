<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use App\PublicNotify;

class PublicNotifiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //project1 :test1が募集した案件
        DB::table('public_notifies')->insert([
            'created_at'=> '2020-09-16 12:30:49',
            'updated_at' => '2020-09-16 12:30:49',
            'public_board_id' => '1', //project_id
            'user_id' => '1',
            'read_flg' => '1',
        ]);
        DB::table('public_notifies')->insert([
            'created_at'=> '2020-09-16 12:30:49',
            'updated_at' => '2020-09-16 12:30:49',
            'public_board_id' => '1', //project_id
            'user_id' => '2',
            'read_flg' => '1',
        ]);

        //project2 :test2が募集した案件
        DB::table('public_notifies')->insert([
            'created_at'=> '2020-09-16 12:30:49',
            'updated_at' => '2020-09-16 12:30:49',
            'public_board_id' => '2', //project_id
            'user_id' => '2',
            'read_flg' => '0',
        ]);
        DB::table('public_notifies')->insert([
            'created_at'=> '2020-09-16 12:30:49',
            'updated_at' => '2020-09-16 12:30:49',
            'public_board_id' => '2', //project_id
            'user_id' => '1',
            'read_flg' => '1',
        ]);
<<<<<<< HEAD
        DB::table('public_notifies')->insert([
            'created_at'=> '2020-09-16 12:30:49',
            'updated_at' => '2020-09-16 12:30:49',
            'public_board_id' => '3', //project_id
            'user_id' => '3',
            'read_flg' => '1',
        ]);
=======

        //factoryを使ってダミーデータ生成
        factory(PublicNotify::class)->create(
          [
            'public_board_id' => 3, //project_id
            'user_id' => '4',
            'read_flg' => '1',
          ]
        );
        factory(PublicNotify::class)->create(
          [
            'public_board_id' => 4, //project_id
            'user_id' => '4',
            'read_flg' => '1',
          ]
        );
        factory(PublicNotify::class)->create(
          [
            'public_board_id' => 5, //project_id
            'user_id' => '4',
            'read_flg' => '1',
          ]
        );
        factory(PublicNotify::class)->create(
          [
            'public_board_id' => 6, //project_id
            'user_id' => '4',
            'read_flg' => '1',
          ]
        );
        factory(PublicNotify::class)->create(
          [
            'public_board_id' => 7, //project_id
            'user_id' => '4',
            'read_flg' => '1',
          ]
        );
        factory(PublicNotify::class)->create(
          [
            'public_board_id' => 8, //project_id
            'user_id' => '4',
            'read_flg' => '1',
          ]
        );
        factory(PublicNotify::class)->create(
          [
            'public_board_id' => 9, //project_id
            'user_id' => '4',
            'read_flg' => '1',
          ]
        );
        factory(PublicNotify::class)->create(
          [
            'public_board_id' => 10, //project_id
            'user_id' => '4',
            'read_flg' => '1',
          ]
        );
        factory(PublicNotify::class)->create(
          [
            'public_board_id' => 11, //project_id
            'user_id' => '4',
            'read_flg' => '1',
          ]
        );
        factory(PublicNotify::class)->create(
          [
            'public_board_id' => 12, //project_id
            'user_id' => '4',
            'read_flg' => '1',
          ]
        );
>>>>>>> deploy
    }
}

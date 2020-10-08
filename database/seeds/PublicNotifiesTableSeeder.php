<?php

use Illuminate\Database\Seeder;

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
    }
}

<?php

use Illuminate\Database\Seeder;

class DirectNotifiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ボードID：１
        DB::table('direct_notifies')->insert([
            'read_flg' => '0',
            'created_at'=> '2020-09-16 12:30:49',
            'updated_at' => '2020-09-16 12:30:49',
            'direct_board_id' => '1',
            'user_id' => '1',
        ]);
        DB::table('direct_notifies')->insert([
            'read_flg' => '1',
            'created_at'=> '2020-09-16 12:30:49',
            'updated_at' => '2020-09-16 12:30:49',
            'direct_board_id' => '1',
            'user_id' => '2',
        ]);
        //ボードID：２
        DB::table('direct_notifies')->insert([
            'read_flg' => '1',
            'created_at'=> '2020-09-16 12:30:49',
            'updated_at' => '2020-09-16 12:30:49',
            'direct_board_id' => '2',
            'user_id' => '1',
        ]);
        DB::table('direct_notifies')->insert([
            'read_flg' => '0',
            'created_at'=> '2020-09-16 12:30:49',
            'updated_at' => '2020-09-16 12:30:49',
            'direct_board_id' => '2',
            'user_id' => '2',
        ]);
        //ボードID：３
        DB::table('direct_notifies')->insert([
            'read_flg' => '1',
            'created_at'=> '2020-09-16 12:30:49',
            'updated_at' => '2020-09-16 12:30:49',
            'direct_board_id' => '3',
            'user_id' => '1',
        ]);
        DB::table('direct_notifies')->insert([
            'read_flg' => '0',
            'created_at'=> '2020-09-16 12:30:49',
            'updated_at' => '2020-09-16 12:30:49',
            'direct_board_id' => '3',
            'user_id' => '2',
        ]);
        // DB::table('direct_notifies')->insert([
        //     'read_flg' => '0',
        //     'created_at'=> '2020-09-16 12:30:49',
        //     'updated_at' => '2020-09-16 12:30:49',
        //     'direct_board_id' => '3',
        //     'user_id' => '2',
        // ]);
        //ボードID：４
        // DB::table('direct_notifies')->insert([
        //     'read_flg' => '1',
        //     'created_at'=> '2020-09-16 12:30:49',
        //     'updated_at' => '2020-09-16 12:30:49',
        //     'direct_board_id' => '4',
        //     'user_id' => '2',
        // ]);
        // DB::table('direct_notifies')->insert([
        //     'read_flg' => '0',
        //     'created_at'=> '2020-09-16 12:30:49',
        //     'updated_at' => '2020-09-16 12:30:49',
        //     'direct_board_id' => '4',
        //     'user_id' => '3',
        // ]);
    }
}

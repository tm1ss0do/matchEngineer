<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class DirectMsgsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ボード１
        DB::table('direct_msgs')->insert([
            'send_date' => '2020-09-16 12:30:49',
            'content' => 'test1のユーザーが出した募集に、test2ユーザーから、応募がきた体のコメントです。',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'sender_id'=> '2',
            'board_id' => '1',
        ]);
        DB::table('direct_msgs')->insert([
            'send_date' => Carbon::now(),
            'content' => 'test1のユーザーから返信です。',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'sender_id'=> '1',
            'board_id' => '1',
        ]);
        DB::table('direct_msgs')->insert([
            'send_date' => Carbon::now(),
            'content' => 'test2のユーザーから返信です。',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'sender_id'=> '2',
            'board_id' => '1',
        ]);
        // ボード２
        DB::table('direct_msgs')->insert([
            'send_date' => '2020-09-16 12:30:49',
            'content' => 'test2のユーザーが出した募集に、test1ユーザーから、応募がきた体のコメントです。',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'sender_id'=> '1',
            'board_id' => '2',
        ]);
        // ボード３
        DB::table('direct_msgs')->insert([
            'send_date' => Carbon::now(),
            'content' => '案件なし。スカウトメッセージなど、ダイレクトメッセージを直接test1->test2へ送っています。',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'sender_id'=> '1',
            'board_id' => '3',
        ]);
    }
}

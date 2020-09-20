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
        //
        DB::table('direct_msgs')->insert([
            'send_date' => '2020-09-16 12:30:49',
            'content' => '既読です・・・test1のユーザーが出した募集に、test2ユーザーから、応募がきた体のコメントです。',
            'read_flg' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'sender_id'=> '2',
            'board_id' => '1',
        ]);
        DB::table('direct_msgs')->insert([
            'send_date' => Carbon::now(),
            'content' => '未読です・・・test1のユーザーから返信です。',
            'read_flg' => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'sender_id'=> '1',
            'board_id' => '1',
        ]);
        DB::table('direct_msgs')->insert([
            'send_date' => '2020-09-16 12:30:49',
            'content' => '既読です・・・test2のユーザーが出した募集に、test1ユーザーから、応募がきた体のコメントです。',
            'read_flg' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'sender_id'=> '1',
            'board_id' => '2',
        ]);
        DB::table('direct_msgs')->insert([
            'send_date' => Carbon::now(),
            'content' => '未読です・・・test2のユーザーから返信です。',
            'read_flg' => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'sender_id'=> '2',
            'board_id' => '1',
        ]);
        DB::table('direct_msgs')->insert([
            'send_date' => Carbon::now(),
            'content' => '未読です・・・案件なし。project_id="0"。直接ダイレクトメッセをtest1->test2へ。',
            'read_flg' => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'sender_id'=> '1',
            'board_id' => '3',
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PublicMsgsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //project_id : 1
        DB::table('public_msgs')->insert([
            'send_date' => '2020-09-16 12:30:49',
            'content' => 'コメント１の本文です。最新です。sender_idは"2"です',
            'created_at'=> '2020-09-16 12:30:49',
            'updated_at' => '2020-09-16 12:30:49',
            'sender_id' => '2',
            'project_id' => '1',
        ]);
        
        //project_id : 2
        DB::table('public_msgs')->insert([
          'send_date' => '2020-09-13 11:30:49',
          'content' => '最新です。sender_idは"1"です',
          'created_at'=> Carbon::now(),
          'updated_at' => Carbon::now(),
          'sender_id' => '1',
          'project_id' => '2',
        ]);
        DB::table('public_msgs')->insert([
          'send_date' => '2020-09-15 12:30:49',
          'content' => 'sender_idは"2"です',
          'created_at'=> '2020-09-15 12:30:49',
          'updated_at' => '2020-09-15 12:30:49',
          'sender_id' => '2',
          'project_id' => '2',
        ]);
        DB::table('public_msgs')->insert([
          'send_date' => Carbon::now(),
          'content' => '最新です。sender_idは"1"です',
          'created_at'=> Carbon::now(),
          'updated_at' => Carbon::now(),
          'sender_id' => '1',
          'project_id' => '2',
        ]);
    }
}

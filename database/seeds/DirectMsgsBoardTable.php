<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DirectMsgsBoardTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ボード１
        DB::table('direct_msgs_boards')->insert([
            'reciever_id' => '1',
            'sender_id' => '2',
            'project_id' => '1',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        // ボード２
        DB::table('direct_msgs_boards')->insert([
            'reciever_id' => '2',
            'sender_id' => '1',
            'project_id' => '2',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        // ボード３
        DB::table('direct_msgs_boards')->insert([
            'reciever_id' => '2',
            'sender_id' => '1',
            'project_id' => null,
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

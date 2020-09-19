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
        //
        DB::table('direct_msgs_boards')->insert([
            'recruiter_id' => '1',
            'applicant_id' => '2',
            'project_id' => '1',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('direct_msgs_boards')->insert([
            'recruiter_id' => '2',
            'applicant_id' => '1',
            'project_id' => '2',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

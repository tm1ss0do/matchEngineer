<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'test1',
            'email' => 'test1@example.com',
            'delete_flg' => '0',
            'self_introduction'=> '自己紹介文',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'test2',
            'email' => 'test2@example.com',
            'delete_flg' => '1',
            'self_introduction'=> '自己紹介文2',
            'password' => bcrypt('pas2word'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        //factoryを使ってダミーデータ
        // factory(App\User\::class, 10)->create();
         factory(App\User::class, 10)->create();
    }
}

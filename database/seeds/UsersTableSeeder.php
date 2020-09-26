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
            'email_verified_at' => now(),
            'profile_icon' => NULL,
            'password' => bcrypt('password'),
            'self_introduction'=> "自己紹介文
            こちらにプロフィールを記載します。
            例：\nエンジニア歴10年です。\r\nweb制作会社を経て自社開発企業に就職し、5年勤めました。\r\n現在はフリーランスとして活動しています。",
            'deleted_at' => NULL,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            // 'exist' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'test2',
            'email' => 'test2@example.com',
            'email_verified_at' => now(),
            'profile_icon' => NULL,
            'password' => bcrypt('pas2word'),
            'self_introduction'=> "自己紹介文2
            ここに自己紹介文を入れます。
            （勤務した会社・勤務年数・所有資格・扱っている言語など）",
            'deleted_at' => NULL,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            // 'exist' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'test3',
            'email' => 'test3@example.com',
            'email_verified_at' => now(),
            'profile_icon' => NULL,
            'password' => bcrypt('pas3word'),
            'self_introduction'=> "自己紹介文333
            ここに自己紹介文を入れます。
            （勤務した会社・勤務年数・所有資格・扱っている言語など）",
            'deleted_at' => NULL,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            // 'exist' => 1
        ]);


        //factoryを使ってダミーデータ
        // factory(App\User\::class, 10)->create();
         factory(App\User::class, 10)->create();
    }
}

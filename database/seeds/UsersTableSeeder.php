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
        ]);
        DB::table('users')->insert([
            'name' => 'test2',
            'email' => 'test2@example.com',
<<<<<<< HEAD
            'delete_flg' => '0',
=======
            'email_verified_at' => now(),
            'profile_icon' => NULL,
            'password' => bcrypt('pas2word'),
>>>>>>> deploy
            'self_introduction'=> "自己紹介文2
            ここに自己紹介文を入れます。
            （勤務した会社・勤務年数・所有資格・扱っている言語など）",
            'deleted_at' => NULL,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'test3',
            'email' => 'test3@example.com',
<<<<<<< HEAD
            'delete_flg' => '0',
            'self_introduction'=> "自己紹介文3
            ここに自己紹介文を入れます。
            （勤務した会社・勤務年数・所有資格・扱っている言語など）",
            'password' => bcrypt('pas3word'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'test4',
            'email' => 'test4@example.com',
            'delete_flg' => '1',
            'self_introduction'=> "自己紹介文4
            削除されているはずのユーザーです",
            'password' => bcrypt('pas4word'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
=======
            'email_verified_at' => now(),
            'profile_icon' => NULL,
            'password' => bcrypt('pas3word'),
            'self_introduction'=> "自己紹介文333
            ここに自己紹介文を入れます。
            （勤務した会社・勤務年数・所有資格・扱っている言語など）",
            'deleted_at' => NULL,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

>>>>>>> deploy

        //factoryを使ってダミーデータ生成
        factory(App\User::class, 10)->create();
    }
}

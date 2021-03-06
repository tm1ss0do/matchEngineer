<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(PublicMsgsTableSeeder::class);
        $this->call(DirectMsgsBoardTable::class);
        $this->call(DirectMsgsTableSeeder::class);
        $this->call(PublicNotifiesTableSeeder::class);
        $this->call(DirectNotifiesTableSeeder::class);

    }
}

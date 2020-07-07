<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Task;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UserSeeder::class);
        factory(User::class,10)->create();
        //factory(Task::class,50)->create();
    }
}

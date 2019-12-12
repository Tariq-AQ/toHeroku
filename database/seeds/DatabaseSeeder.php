<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {

        $this->call([

            JobsTableSeeder::class,
            UsersSeeder::class,

        ]);
    }
}

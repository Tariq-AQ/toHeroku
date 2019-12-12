<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{

    public function run()
    {

        factory(User::class, 20)->create();
    }
}

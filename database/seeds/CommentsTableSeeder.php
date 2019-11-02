<?php

use Illuminate\Database\Seeder;
use Faker\Factory as faker;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\comment');

        foreach (range(1, 10) as $index) {

            DB::table('comments')->insert([

                'comment' => $faker->paragraph,
                'likes' => $faker->randomDigit,
                'name' => $faker->firstname,


            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;
use Faker\Factory as Faker;

class UsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        User::create
        ([
            'name' => $faker->word(),
            'email' => "fake@faker.com",
            'password' => Hash::make('pass')
        ]);
    }
}
<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Maker;
use App\Vehicle;
use Faker\Factory as Faker;

class OauthClientSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 0; $i < 10; $i++) {
            DB::table('oauth_clients')->insert
            ([
                'id' => "id$i",
                'secret' => "secret$i",
                'name' => "client$i"
            ]);
        }
    }
}
<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Maker;
use App\Vehicle;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Maker::truncate();
        Vehicle::truncate();
        User::truncate();
        DB::table('oauth_clients')->truncate();
        Model::unguard();

        $this->call(MakersSeed::class);
        $this->call(VehiclesSeed::class);
        $this->call(UsersSeed::class);
        $this->call(OauthClientSeed::class);

        Model::reguard();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

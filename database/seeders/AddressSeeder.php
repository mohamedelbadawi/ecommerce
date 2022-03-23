<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $users = User::all()->pluck('id')->toArray();
        for ($i = 0; $i < 300; $i++) {
            DB::table('addresses')->insert(['street_address' => $faker->streetAddress,
                'city' => $faker->city,
                'code' => $faker->postcode,
                'user_id' => rand(1,50)]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use faker\Factory as faker;
use App\Models\Service;


class Services extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10000; $i++) {
            Service::insert([
                'provider_id' => $faker->numberBetween(1, 100),
                'name' => $faker->name,
                'price' => $faker->numberBetween(50000, 3000000),
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'created_at' => $faker->dateTimeBetween('01-01-2001', 'now', $timezone = null),
            ]);
        };
    }
}

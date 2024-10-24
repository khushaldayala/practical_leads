<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Helpers\RankCalculator;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => $faker->name,
                'points' => rand(10000, 99999),
                'activity_time' => Carbon::now()->subDays(rand(0, 30)),
            ]);
        }

        RankCalculator::calculateRanks();
    }
}

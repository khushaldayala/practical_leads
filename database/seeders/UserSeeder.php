<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Helpers\RankCalculator;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => "User {$i}",
                'points' => rand(10000, 99999),
                'activity_time' => Carbon::now()->subDays(rand(0, 30)),
            ]);
        }

        RankCalculator::calculateRanks();
    }
}

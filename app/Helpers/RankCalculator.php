<?php

namespace App\Helpers;

use App\Models\User;

class RankCalculator
{
    public static function calculateRanks()
    {
        $users = User::orderBy('points', 'desc')->get();

        $currentRank = 0;
        $previousPoints = null;

        foreach ($users as $user) {
            if ($previousPoints === null || $user->points !== $previousPoints) {
                $currentRank++;
            }

            $user->rank = $currentRank;
            $user->save();

            $previousPoints = $user->points;
        }
    }
}

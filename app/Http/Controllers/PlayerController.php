<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PlayerController extends Controller
{
    protected const K = 1.618003398875;
    public function index(Request $request)
    {
        $params = $request->all();
        if (Auth::check() && !Session::has('savePoints')) {
            $id = Auth::id();
            $user = User::findOrFail($id);
            $level = $user->level;
            $totalTime = (int)$user->total_time + (int)$params['time'];
            $totalPoints = $user->total_points;
            $gameCount = (int)$user->game_count + 1;
            $user->total_time = $totalTime;
            $user->game_count = $gameCount;
            $totalPoints = $this->CalculateTotalPoints($level, $params['kill'], $totalPoints, $params['time']);
            $user->total_points = $totalPoints;
//            dd($totalPoints);
            $newLevel = $this->CalculateLevel($totalPoints);
            $user->level = $newLevel;
            $user->coins = $this->CalculateCoins($level, $newLevel);
            $user->save();
            Session::put('savePoints', 1);
        }

        if(Session::has('is_playing') && Session::get('is_playing')) {
            Session::put('is_playing', false);
        }

        return view('player.gameOver', compact('params'));
    }

    public function CalculateTotalPoints($level, $kill, $totalXP, $time) {
        $killXP = round(($level - 1) * (self::K - 1) / self::K ** 2);
        $killXP = $killXP >= 1 ? $killXP : 1;
//        dd($killXP, $totalXP);
        $totalXP += $killXP * $kill + round($time / 10);
        return $totalXP;
    }

    public function CalculateLevel($totalPoints) {
        $level = floor(10 ** (log10($totalPoints) / self::K ** 2));
        return $level;
    }

    public function CalculateCoins($oldLevel, $thisLevel) {
        if ($thisLevel - $oldLevel > 0) {
            $coins = 0;
            for ($i = 0; $i < ($thisLevel - $oldLevel); $i++) {
                $coins += ($oldLevel + $i) * 16;
            }
        }
        return $coins;
    }

    public function start()
    {
        if(Auth::user()) {
            if(Session::has('is_playing') && Session::get('is_playing')) {
                return redirect()->back();
            }
            Session::put('is_playing', true);
        }
        return view('game.start');
    }
}

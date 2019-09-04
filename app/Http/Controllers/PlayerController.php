<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PlayerController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->all();
        //Session::forget('count');
        if (!Session::has('savePoints')) {
            // dd($params);
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
            $user->level = $this->CalculateLevel($totalPoints);
            $user->save();
            Session::put('savePoints', 1);
        }
        return view('player.gameOver', compact('params'));
    }

    public function CalculateTotalPoints($level, $XP, $totalXP, $time) {
        if ($level < 8) {
            $totalXP += $XP + floor($time / 10);
            return $totalXP;
        } elseif ($level < 16) {
            $totalXP += $XP * 2 + floor($time / 10);
            return $totalXP;
        }
    }

    public function CalculateLevel($totalPoints) {
        if ($totalPoints < 6) {
            return $level = 1;
        } elseif ($totalPoints < 18) {
            return $level = 2;
        } elseif ($totalPoints < 38) {
            return $level = 3;
        } elseif ($totalPoints < 68) {
            return $level = 4;
        } elseif ($totalPoints < 109) {
            return $level = 5;
        } elseif ($totalPoints < 163) {
            return $level = 6;
        } elseif ($totalPoints < 231) {
            return $level = 7;
        } elseif ($totalPoints < 315) {
            return $level = 8;
        } elseif ($totalPoints < 415) {
            return $level = 9;
        } elseif ($totalPoints < 535) {
            return $level = 10;
        } else return $level = 11;
    }
}

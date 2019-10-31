<?php

namespace App\Http\Controllers;

use App\Http\Requests\Payment\PaymentInfoRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class PlayerController extends Controller
{
    protected const K = 1.618003398875;

    public function index(Request $request)
    {
        $params = $request->all();
        if (Auth::check() && !Session::has('savePoints')) {
            $id = Auth::id();
            $user = User::query()->findOrFail($id);
            $thisCoins = $user->coins;
            $user_updated_data = $this->UpdateUser($user, $params);
            $thisCoins = $user->coins - $thisCoins;
            if($user_updated_data['updated']) {
                $playerPoints = $user_updated_data['points'];
            } else {
                //todo need to show some error
                return response('Something went wrong', 500);
            }
        } else {
            $playerPoints = $this->CalculateTotalPoints(1, $params['kill'], 0, $params['time']);
            $user = false;
            $thisCoins = false;
        }

        $user = Auth::user();
        if($user) {
            $user->update(['is_playing' => 0]);
        }

        return view('player.gameOver', compact('params', 'playerPoints', 'user', 'thisCoins'));
    }

    protected function UpdateUser (User $user, $params) {
        $level = $user->level;

        $totalTime = (int)$user->total_time + (int)$params['time'];
        $totalPoints = $user->total_points;
        $gameCount = (int)$user->game_count + 1;
        $totalPoints = $this->CalculateTotalPoints($level, $params['kill'], $totalPoints, $params['time']);
        $playerPoints = $totalPoints - $user->total_points;
        $newLevel = $this->CalculateLevel($totalPoints);

        $updated = $user->update([
            'total_points' => $totalPoints,
            'total_time' => $totalTime,
            'game_count' => $gameCount,
            'level' => $newLevel,
            'coins' => $user->coins + $this->CalculateCoins($level, $newLevel)
        ]);

        if($updated) {
            Session::put('savePoints', 1);
        }
        $data = ['updated'=>$updated, 'points' => $playerPoints];
        return $data;
    }

    protected function CalculateTotalPoints($level, $kill, $totalXP, $time) {
        $killXP = round(($level - 1) * (self::K - 1) / self::K ** 2);
        $killXP = $killXP >= 1 ? $killXP : 1;
        $totalXP += $killXP * $kill + round($time / 60);
        return $totalXP;
    }

    public function CalculateLevel($totalPoints) {
        if ((int)$totalPoints === 6) {
            return 2;
        } else {
            $level = floor(10 ** (log10($totalPoints) / self::K ** 2));
            return $level ? $level : 1;
        }
    }

    public function CalculateCoins($oldLevel, $thisLevel) {
        $coins = 0;
        if ($thisLevel - $oldLevel > 0) {
            for ($i = 0; $i < ($thisLevel - $oldLevel); $i++) {
                $coins += ($oldLevel + $i) * 16;
            }
        }
        return $coins;
    }

    public function start(Request $request)
    {
        Session::forget('savePoints');

        $user = Auth::user();
        if($user) {
            if($user->is_playing) {
                return redirect()->back();
            }
            $user->update(['is_playing' => 1]);

        }
        Session::put('nickname', $request->nickname);
        return view('game.start');
    }

    public function gameClose(Request $request) {
        $params = $request->player;

        $id     = $request->player['userId'];
        $user   = User::query()->findOrFail($id);

        $this->UpdateUser($user, $params);
        $user->update(['is_playing' => 0]);
    }
}

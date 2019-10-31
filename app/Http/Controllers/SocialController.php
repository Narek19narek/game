<?php
namespace App\Http\Controllers;

use App\Models\SocialAuth;
use App\Models\UserSkin;
use App\Skin;
use App\User;
use Exception;
use Laravel\Socialite\Facades\Socialite;

class SocialController
{
    /**
     * @param $provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function authenticate($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * @param $provider
     * @throws Exception
     */
    public function login($provider)
    {
        try {
            $socialUserInfo = Socialite::driver($provider)->user();

            $user = User::query()
                ->firstOrCreate(
                    ['email' => $socialUserInfo->getEmail()],
                    ['name' => $socialUserInfo->getName(), 'skeen_id' => Skin::defaultSkin()]
                );

            UserSkin::query()->firstOrCreate(['user_id' => $user->id, 'skin_id' => Skin::defaultSkin()]);

            SocialAuth::query()->firstOrCreate([
                'user_id'     => $user->id,
                'provider_id' => $socialUserInfo->getId(),
                'provider'    => $provider
            ]);

            auth()->login($user);

            return redirect()->route('home');
        } catch (Exception $e) {
            throw new Exception("failed to authenticate with $provider");
        }
    }
}

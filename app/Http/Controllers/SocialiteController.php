<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function loginGithub()
    {
        return Socialite::driver('github')->stateless()->redirect();
    }

    public function callbackGithub()
    {
        $githubUser = Socialite::driver('github')->stateless()->user();

        $user = User::updateOrCreate([
            'github_id' => $githubUser->id,
        ],
            [
                'name' => $githubUser->name,
                'username' => $githubUser->nickname,
                'email' => $githubUser->email,
                'github_token' => $githubUser->token,
                'github_refresh_token' => $githubUser->refreshToken,
                'avatar' => $githubUser->avatar,
                'bio' => $githubUser->user['bio'] ?? null,
                'number_of_public_repos' => $githubUser->user['public_repos'] ?? null,
            ]);

        Auth::login($user);

        return redirect('/dashboard');
    }
}

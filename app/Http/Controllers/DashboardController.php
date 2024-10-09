<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $search = $request->input('search');

        $response = Http::withToken(auth()->user()->github_token)->get('https://api.github.com/user/repos');

        $repos = $response->json();

        if ($search) {
            $repos = array_filter($repos, function ($repo) use ($search) {
                return stripos($repo['name'], $search) !== false;
            });
        }

        return view('dashboard', compact('repos'));
    }
}

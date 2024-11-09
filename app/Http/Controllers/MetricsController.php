<?php

namespace App\Http\Controllers;

use App\Jobs\standardJob;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class MetricsController extends Controller
{
    public function generateJob(): RedirectResponse
    {
        dispatch(new standardJob());

        return Redirect::to('/dashboard');
    }

    public function generateSlowJob(): RedirectResponse
    {
        dispatch(new standardJob(true));

        return Redirect::to('/dashboard');
    }

    public function generateSlowQuery(): RedirectResponse
    {
        DB::select('SELECT SLEEP(5)');

        return Redirect::to('/dashboard');
    }

    public function hitCache(Request $request): RedirectResponse
    {
        $user = Cache::get("user_{$request->user()->id}");

        if (!$user) {
            $user = $request->user();
            Cache::set("user_{$user->id}", $user, 100);
        }

        return Redirect::to('/dashboard');
    }

    public function forgetCache(Request $request): RedirectResponse
    {
        Cache::forget("user_{$request->user()->id}");

        return Redirect::to('/dashboard');
    }

    public function slowRequest(): RedirectResponse
    {
        sleep(rand(1, 5));

        return Redirect::to('/dashboard');
    }

    public function slowOutgoingRequest(): RedirectResponse
    {
        Http::get('https://httpbin.org/delay/' . rand(1, 5));

        return Redirect::to('/dashboard');
    }

    public function makeException()
    {
        return 1 / 0;
    }
}

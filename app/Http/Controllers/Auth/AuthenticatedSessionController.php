<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $this->royal_app();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    // Royal Apps API Authentication on Logging In
    public function royal_app()
    {
        $url = 'https://candidate-testing.api.royal-apps.io/api/v2/token';
        $user = auth()->user();
        $response = Http::post($url, [
            'email' => $user->email,
            'password' => $user->api_password,
        ], [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ]);

        if($response->status() == 200) session(['credentials' => json_decode($response->body())]);
        else session(['credentials' => null]);


    }
}

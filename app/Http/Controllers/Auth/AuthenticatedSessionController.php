<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Carbon\Carbon;

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
        $credentials = $request->only('email', 'password');

        // dd($request);

        

        if (Auth::attempt($credentials)) {
            if (auth()->user()->user_type === 'admin') {
                $request->authenticate();
                $request->session()->regenerate();
                $device = request()->header('sec-ch-ua-platform');
                $browser = request()->header('sec-ch-ua');
                // device 
               

                if (preg_match('/"([^"]*Google Chrome[^"]*)"/', $browser, $matches)) {
                        $browser = $matches[1]; // Extracted value is in $matches[1]
                } else {
                    $browser = 'Browser not found';
                }

                $request->user()->update([
                    'last_login_at' => Carbon::now()->toDateTimeString(),
                    'last_login_ip' => $request->getClientIp(),
                    'brower_login' => $browser,
                    'os_login' => str_replace(['"', "'"], '', $device),
                ]);

                
                return redirect()->intended(prefix_url(). RouteServiceProvider::HOME)->with('success', 'your login successfully');
               
            }

            Auth::logout();
            return admin_redirect('login')->with('error', 'Unauthorized access.');
        }

        return redirect()->back()->withErrors('Invalid credentials');        
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'your logout successfully');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Rules\capchaRule;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Carbon\Carbon;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    public function loginViewQrcode(): View
    {
        $agent = new Agent();
        $device = $agent->device();
        $platform = $agent->platform();
        $browser = $agent->browser();
        $is_desktop = $agent->isDesktop();
        $is_phone = $agent->isPhone();
        $qrcode_login = str()->random(100);
        return view('auth.login-qrcode', ['code' => $qrcode_login.','.$device.','.$platform.','.$browser.'chamnan']);
    }


    public function loginQrcode(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        $request->validate([
            'captcha' => 'required'
        ]);

        if (!capchaRule::validateCaptcha($request->captcha)) {
          
            return redirect()->back()->with('error', 'Invalid captcha. Please try again.');
        }
        
        if (Auth::attempt($credentials)) {
            
            if(auth()->user()->activated === 0) {
                return redirect()->back()->with('error', 'Please check your email and activate account');
            }

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

        return redirect()->back()->with('error','Invalid credentials');        
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        $is_activated =  DB::table('users')->where('email', $request->email)->first()->activated;

        if(!$is_activated) {
            return redirect()->back()->with('error','Please activate your account.');
        }

        if(settings()->captcha) {

            $request->validate([
                'captcha' => 'required'
            ]);

            if (!capchaRule::validateCaptcha($request->captcha)) {
            
                return redirect()->back()->with('error', 'Invalid captcha. Please try again.');
            }

        }

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

        return redirect()->back()->with('error','Invalid credentials');        
    }


    // reload captcha
    public function reloadCaptcha()
    {
        $configCaptchaType = config('captcha.CAPTCHA_TYPE');

        // Initialize variable to store captcha type
        $captchaType = '';

        // If the config number is 0, set captcha type to 'flat' (alphanumeric)
        // If it's 1, set captcha type to 'math'
        if ($configCaptchaType == 0) {
            $captchaType = 'alphanumeric';
        } else {
            $captchaType = 'math';
        }

        // the generated type will be stored in the captchaImage
        $captchaImage = captcha_img($captchaType);

        // Return JSON response with the generated captcha image
        return response()->json(['captcha' => $captchaImage]);
    }


    public static function generateCaptcha()
    {
        $configCaptchaType = config('captcha.CAPTCHA_TYPE');

        // If the config number is 0, generate a 'flat' (alphanumeric) captcha,
        // otherwise, generate a 'math' captcha
        if ($configCaptchaType == 0) {
            return captcha_img('alphanumeric');
        } else {
            return captcha_img('math');
        }
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

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

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

        return redirect()->intended(route('profile', absolute: false));
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

    public function yandex() // перенаправляем юзера на яндекс Auth
    {
        return Socialite::driver('yandex')->redirect();
    }
    public function CallbackYandex() {
        $user = Socialite::driver('yandex')->user();

        // dd($user);
        $existingUser = User::where('email', $user->email)->first();
        if (!$existingUser) {
            $userData = $user->user;
            if (isset($userData['default_phone']['number'])) {
                $phoneNumber = $userData['default_phone']['number'];
            } else {
                $phoneNumber = null;
            }

            $newUser = User::create([
                'name'=>$user->name,
                'email'=>$user->email,
                'password'=>null,
                'phone'=>$phoneNumber
            ]);
            Auth::login($newUser);
            return redirect(route('index'));
        } else {
            if ($existingUser->password === null){
                Auth::login($existingUser);
                return redirect(route('index'));
            } else {
                return redirect(route('login'))->with('error', 'Используйте логин-пароль для входа');
            }
        }
    }
}

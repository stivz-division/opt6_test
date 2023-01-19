<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthUserRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __invoke(AuthUserRequest $request)
    {
        if (Auth::attempt($request->only(['email', 'password']), true)) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'auth' => __('Неверный логин или пароль.')
        ]);
    }
}

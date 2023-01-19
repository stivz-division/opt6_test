<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class AuthUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $this->rateLimiterAuth();

        return [
//            'email' => 'required|email:rfc,dns|exists:users,email',
            'email' => 'required|email:rfc|exists:users,email',
            'password' => 'required'
        ];
    }

    private function rateLimiterAuth(): void
    {
        RateLimiter::hit($this->keyRateLimiter());

        if (RateLimiter::tooManyAttempts($this->keyRateLimiter(), 3)) {
            throw ValidationException::withMessages(['number' => trans('auth.throttle', [
                'seconds' => RateLimiter::availableIn($this->keyRateLimiter())
            ])]);
        }
    }

    private function keyRateLimiter(): string
    {
        return 'auth:' . \request()->ip();
    }
}

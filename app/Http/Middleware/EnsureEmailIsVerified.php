<?php
// app/Http/Middleware/EnsureEmailIsVerified.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class EnsureEmailIsVerified
{
    public function handle($request, Closure $next)
    {
        if ($request->user() instanceof MustVerifyEmail &&
            ! $request->user()->hasVerifiedEmail()) {
            return redirect('/enter-code'); // Измените на ваш URL с кодом верификации
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Merchant extends Middleware
{
    protected function authenticate($request, array $guards)
    {
        if ($this->auth->guard('merchant')->check()) {
            return $this->auth->shouldUse('merchant');
        }

        return $this->unauthenticated($request, ['merchant']);
    }

    protected function redirectTo($request)
    {
        return route('merchant.login');
    }

    protected function unauthenticated($request, array $guards)
    {
        throw new AuthenticationException(
            'Unauthenticated.',
            $guards,
            $this->redirectTo($request)
        );
    }
}

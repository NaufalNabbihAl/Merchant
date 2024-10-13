<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Customer extends Middleware
{
    protected function authenticate($request, array $guards)
    {
        if ($this->auth->guard('customer')->check()) {
            return $this->auth->shouldUse('customer');
        }

        return redirect()->route('customer.login')->with('error', 'Silakan login terlebih dahulu.');
    }

    protected function redirectTo($request)
    {
        return route('customer.login');
    }
}


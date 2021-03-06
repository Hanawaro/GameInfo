<?php

namespace App\Http\Middleware;

use Closure;
use Doctrine\DBAL\Exception;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    public function handle($request, Closure $next, ...$guards)
    {
        $response = $next($request);

        if ($response->exception != null) {
            if (isset($response->exception->status) && $response->exception->status != 422)
                return redirect()->route('article.all');
            else if (!isset($response->exception->status))
                return redirect()->route('article.all');
        }

        return $response;
    }
}

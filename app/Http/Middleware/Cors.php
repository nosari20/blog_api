<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
           // ALLOW OPTIONS METHOD
        $headers = [
            'Access-Control-Allow-Origin' => $_SERVER['HTTP_ORIGIN'],
            'Access-Control-Allow-Headers' => 'Origin, Content-Type'
        ];

        if ($request->getMethod() != "OPTIONS") {
            return $next($request);
        }

        $response = $next($request);

        foreach ($headers as $key => $value) {
            $response->header($key, $value);
        }

        return $response;
    }
}

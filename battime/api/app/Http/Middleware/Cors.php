<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * The list of allowed origins.
     *
     * @var string[]
     */
    protected $allowedOrigins = [
        'https://web.battime.tech',
        'http://127.0.0.1:3000',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $origin = $request->headers->get('Origin');
        if (in_array($origin, $this->allowedOrigins)) {
            $response->headers->set('Access-Control-Allow-Origin', $origin);
        }


        $response->headers->set('Access-Control-Allow-Methods', '*'); // Specify actual methods
        $response->headers->set('Access-Control-Allow-Headers', '*'); // Specify actual headers



        return $response;
    }
}


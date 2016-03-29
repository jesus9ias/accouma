<?php

namespace App\Http\Middleware\basic;

use Closure;

class loggerMiddleware{

    public function handle($request, Closure $next){
        return $next($request);
    }
}

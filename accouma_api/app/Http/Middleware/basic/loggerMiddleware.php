<?php

namespace App\Http\Middleware\basic;

use Closure;

class loggerMiddleware{

    public function handle($request, Closure $next){
      $segment = $request->segment(3);
      $request->attributes->add(['url' => $segment]);
      return $next($request);
    }
}

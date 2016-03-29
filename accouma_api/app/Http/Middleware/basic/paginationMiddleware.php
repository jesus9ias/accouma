<?php

namespace App\Http\Middleware\basic;

use Closure;
use Response;

class paginationMiddleware{

	public function handle($request, Closure $next){
		$request->attributes->add(['skip' => 0]);
		$request->attributes->add(['take' => 10]);
		return $next($request);
	}

}

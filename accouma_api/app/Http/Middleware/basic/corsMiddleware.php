<?php

namespace App\Http\Middleware\basic;

use Closure;
use Response;

class corsMiddleware{

	public function handle($request, Closure $next){
		return $next($request)->header('Access-Control-Allow-Origin' , '*')
          ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
          ->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With');
	}

}

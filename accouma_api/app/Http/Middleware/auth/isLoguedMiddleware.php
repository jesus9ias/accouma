<?php

namespace App\Http\Middleware\auth;

use Closure;
use Response;
use App\models\usersModel as users;

class isLoguedMiddleware{


	public function handle($request, Closure $next){
		$use_auth = env('USE_AUTH',true);
		$id = $request->get('id', 0);
		$token = $request->get('token', '');

		if($use_auth == true){
			$user = users::where('id', '=', $id)
				->where('token', '=', $token)
				->get();
			if(count($user) == 1){
				return $next($request);
			}else{
				return Response::json([
					'result' => [
						'logued' => false
					],
					'msg' => 'Not logued'
				], 200);
			}
		}else{
			return $next($request);
		}
	}

}

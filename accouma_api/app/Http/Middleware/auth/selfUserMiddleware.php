<?php

namespace App\Http\Middleware\auth;

use Closure;
use Response;
use App\models\usersRolesModel as usersRoles;

class selfUserMiddleware{

	public function handle($request, Closure $next){
		$user = $request->get('user');

		if($request->get('user_id',0) == $user->id){
			return $next($request);
		}else{
			return Response::json([
				'result' => [
					'isSelf' => false
				],
				'msg' => 'Not the same logued user'
			], 200);
		}
	}

}

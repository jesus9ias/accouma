<?php

namespace App\Http\Middleware\auth;

use Closure;
use Response;
use App\models\usersRolesModel as usersRoles;

class isAdminMiddleware{

	public function handle($request, Closure $next){
		$id = $request->get('id', 0);
		$roles = usersRoles::getRoleByUser($id, 'admin', 2);
		if(count($roles) >= 1){
			return $next($request);
		}else{
			return Response::json([
				'result' => [
					'has' => false
				],
				'msg' => 'Has Not Admin Role'
			], 200);
		}
	}

}

<?php

namespace App\Http\Middleware\auth;

use Closure;
use Response;
use App\models\usersRolesModel as usersRoles;

class isAdminMiddleware{

	public function handle($request, Closure $next){
		$use_auth = env('USE_AUTH',true);
		$id = $request->get('id', 0);
		if($use_auth == true){
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
		}else{
			return $next($request);
		}
	}

}

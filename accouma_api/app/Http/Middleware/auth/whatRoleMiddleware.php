<?php

namespace App\Http\Middleware\auth;

use Closure;
use Response;
use App\models\usersRolesModel as usersRoles;

class whatRoleMiddleware{

	public function handle($request, Closure $next){
		$user = $request->get('user');
		$roles = usersRoles::getRolesByUser($user->id, 2);

		$filteredRoles = [];
		foreach($roles as $n => $v){
			$filteredRoles[] = $v->role_slug;
		}

		$request->attributes->add(['roles' => $roles]);
		$request->attributes->add(['filteredRoles' => $filteredRoles]);

		return $next($request);
	}

}

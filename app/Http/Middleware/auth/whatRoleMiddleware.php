<?php

namespace App\Http\Middleware\auth;

use DB;
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

		$actions = DB::table('role_actions')
			->select(['action'])
			->whereIn('role_slug', $filteredRoles)
			->get();

		$role_actions = [];
		foreach($actions as $n => $v){
			$role_actions[] = $v->action;
		}

		$request->attributes->add(['roles' => $filteredRoles, 'role_actions' => $role_actions]);

		return $next($request);
	}

}

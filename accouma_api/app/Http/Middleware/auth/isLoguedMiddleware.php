<?php

namespace App\Http\Middleware\auth;

use Closure;
use Response;
use App\models\usersModel as users;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class isLoguedMiddleware{


	public function handle($request, Closure $next){
		$use_auth = env('USE_AUTH',true);
		$id = $request->get('id', 0);
		$token = $request->get('token', '');

		if($use_auth == true){
			//JWTAuth::parseToken();
			//$t = JWTAuth::parseToken()->authenticate();
			try{
				//$user = JWTAuth::parseToken()->authenticate();
				if (!$user = JWTAuth::parseToken()->authenticate()) {
					return Response::json([
						'result' => [
							'logued' => false,
							'token' => $token
						],
						'msg' => 'Not logued'
					], 200);
				}
			} catch (TokenExpiredException $e) {
				return Response::json([
					'error' => 'token_expired',
					'msg' => 'Token can not be used'
				], 200);
			} catch (TokenInvalidException $e) {
				return Response::json([
					'error' => 'token_invalid',
					'msg' => 'Token can not be parsed'
				], 200);
			} catch (JWTException $e) {
				return Response::json([
					'error' => 'token_invalid',
					'msg' => 'Token can not be parsed'
				], 200);
			}

			if($user->token == $token){
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

<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Request;
use Response;
use Hash;

use App\Helpers\Helpers;
use App\models\usersModel as Users;
use App\models\userTokensModel as Tokens;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class loginController extends Controller{
  public function __construct(){
		$this->middleware('isLogued', ['only' => ['isLogued']]);
	}

  public function login(){
    $nick = Request::input('nick', '');
    $pass = Request::input('pass', '');

    $user = Users::where('nick', '=', $nick)->get();
    if(count($user) == 1){
      $apass = $user[0]->pass;
      $id= $user[0]->id;

      if(Hash::check($pass, $apass)){

        $token = JWTAuth::fromUser($user[0]);

        //$token = Helpers::random_txt(64);
        Users::updateUser($id, ['token' => $token]);
        return Response::json([
          'result' => [
            'token' => $token
          ],
          'msg' => 'Success'
        ], 200);
      }else{
        return Response::json([
          'result' => [],
          'msg' => 'Not Found'
        ], 404);
      }
    }else{
      return Response::json([
        'result' => [],
        'msg' => 'Not Found'
      ], 404);
    }
  }

  public function isLogued(){
    $logued = Request::get('logued', false);
    if($logued == true){
      return Response::json([
        'result' => [
          'logued' => true
        ],
        'msg' => 'logued'
      ], 200);
    }else{
      return Response::json([
        'result' => [
          'logued' => false
        ],
        'msg' => 'Not logued'
      ], 200);
    }
  }

  public function close(){
    $id = Request::get('id', 0);
    $token = Request::get('token', '');

    $user = Users::where('id', '=', $id)
      ->where('token', '=', $token)
      ->get();
    if(count($user) == 1){
      Users::updateUser($id, ['token' => $token]);
      return Response::json([
        'result' => [],
        'msg' => 'Success',
      ], 200);
    }else{
      return Response::json([
        'result' => [],
        'msg' => 'Not Found'
      ], 404);
    }
  }
}

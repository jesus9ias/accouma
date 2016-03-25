<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Request;
use Response;

use App\Helpers\Helpers;
use App\models\usersModel as users;
use App\models\usersTokensModel as usersTokens;

class recoveController extends Controller{

  public function sendRecoveToken(){
    $id = Request::input('id', 0);
    $token = Helpers::random_txt(64);
    $data = [
      'user_id' => $id,
      'token' => $token,
      'date_created' => date("Y-m-d H:i:s"),
      'date_used' => Null,
      'status' => 1
    ];
    usersTokens::createUserToken($data);

    return Response::json([
      'result' => [],
      'msg' => 'Success',
    ], 200);

  }

  public function completeRecove($email, $token){
    $id = 1;
    $data = [
      'date_used' => date("Y-m-d H:i:s"),
      'status' => 2
    ];
    usersTokens::updateUserToken($id, $data);

    return Response::json([
      'result' => [],
      'msg' => 'Success',
    ], 200);

  }
}

<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Request;
use Response;
use Hash;

use App\Helpers\Helpers;
use App\models\usersModel as Users;
use App\models\usersRolesModel as UsersRoles;

class meController extends Controller{

  public function __construct(){
    $this->middleware('isLogued');
    $this->middleware('whatRole');
    $this->middleware('logger');
  }

  public function updatePass(){
    $pass = Request::get('pass', '');
    $newPass = Hash::make($pass);
    $user = Request::get('user');
    Users::updateUser($user->id, ['pass' => $newPass]);
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }
}

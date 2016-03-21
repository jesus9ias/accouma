<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Request;
use Response;
use Hash;

use App\models\usersModel as users;

class usersController extends Controller{

  public function index(){
    $users = users::getUsers();
    return Response::json([
      'result' => [
        'rows' => $users
      ],
      'msg' => 'Success'
    ], 200);
  }

  public function edit($id){
    $user = users::getUser($id);
    if(count($user) == 1){
      return Response::json([
        'result' => [
          'row' => $user[0]
        ],
        'msg' => 'success'
      ], 200);
    }else{
      return Response::json([
        'result' => [],
        'msg' => 'Not Found'
      ], 404);
    }
  }

  public function update($id){
    $names = Request::get('names', '');
    $last_names = Request::get('last_names', '');
    $data = ['names' => $names, 'last_names' => $last_names];
    users::updateUser($id, $data);
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }

  public function update_pass($id){
    $pass = Request::get('pass', '');
    $newPass = Hash::make($pass);
    users::updateUserPass($id, $newPass);
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }

  public function active($id){
    users::activeUser($id);
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }

  public function unactive($id){
    users::unactiveUser($id);
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }



}

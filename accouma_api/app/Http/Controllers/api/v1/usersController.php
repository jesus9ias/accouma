<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Request;
use Response;
use Hash;

use App\Helpers\Helpers;
use App\models\usersModel as users;
use App\models\userRolesModel as userRoles;

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

  public function create(){
    $names = Request::input('names', '');
    $last_names = Request::input('last_names', '');
    $user = Request::input('user', '');
    $email = Request::input('email', '');
    $make_admin = Request::input('make_admin', 0);

    $pass = Helpers::random_txt(8);
    $hpass = Hash::make($pass);

    $userData = [
      'names' => $names,
      'last_names' => $last_names,
      'user' => $user,
      'email' => $email,
      'pass' => $hpass,
      'date_created' => date("Y-m-d h:i:s"),
      'date_updated' => Null,
      'status' => 1
    ];
    $newUserId = users::createUser($userData);
    $userRoleData = [
      'user_id' => $newUserId,
      'role_slug' => 'user',
      'date_created' => date("Y-m-d h:i:s"),
      'date_removed' => Null,
      'status' => 2
    ];
    $newUserRoleId = userRoles::createUserRole($userRoleData);
    if($make_admin == 1){
      $adminRoleData = [
        'user_id' => $newUserId,
        'role_slug' => 'admin',
        'date_created' => date("Y-m-d h:i:s"),
        'date_removed' => Null,
        'status' => 2
      ];
      $newAdminRoleId = userRoles::createUserRole($adminRoleData);
    }else{
      $newAdminRoleId = 0;
    }
    return Response::json([
      'result' => [
        'newUserId' => $newUserId,
        'newUserRoleId' => $newUserRoleId,
        'newAdminRoleId' => $newAdminRoleId
      ],
      'msg' => 'success'
    ], 200);
  }

  public function updatePass($id){
    $pass = Request::get('pass', '');
    $newPass = Hash::make($pass);
    users::updateUser($id, ['pass' => $newPass]);
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }

  public function activate($id){
    users::updateUser($id, ['status' => 2]);
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }

  public function disable($id){
    users::updateUser($id, ['status' => 3]);
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }



}

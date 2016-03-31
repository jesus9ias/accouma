<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Request;
use Response;
use Hash;

use App\Helpers\Helpers;
use App\models\usersModel as Users;
use App\models\usersRolesModel as UsersRoles;

class usersController extends Controller{

  public function __construct(){
		$this->middleware('isLogued');
		$this->middleware('isAdmin', ['only' => ['create', 'update', 'activate', 'disable']]);
		$this->middleware('pagination', ['only' => ['get']]);
		$this->middleware('logger');
	}

  public function get(){
    $skip = Request::get('skip', 0);
    $take = Request::get('take', 0);
    $order = Request::get('order', '');

    $users = Users::getUsers(['paginate' => ['skip' => $skip, 'take' => $take] ]);
    return Response::json([
      'result' => [
        'rows' => $users
      ],
      'msg' => 'Success',
      'tot_pages' => Request::get('tot_pages', '')
    ], 200);
  }

  public function edit($user_id){
    $user = Users::getUser($user_id);
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

  public function update($user_id){
    $names = Request::get('names', '');
    $last_names = Request::get('last_names', '');
    $data = ['names' => $names, 'last_names' => $last_names];
    Users::updateUser($user_id, $data);
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
    $newUserId = Users::createUser($userData);
    $userRoleData = [
      'user_id' => $newUserId,
      'role_slug' => 'user',
      'date_created' => date("Y-m-d h:i:s"),
      'date_removed' => Null,
      'status' => 2
    ];
    $newUserRoleId = UsersRoles::createUserRole($userRoleData);
    if($make_admin == 1){
      $adminRoleData = [
        'user_id' => $newUserId,
        'role_slug' => 'admin',
        'date_created' => date("Y-m-d h:i:s"),
        'date_removed' => Null,
        'status' => 2
      ];
      $newAdminRoleId = UsersRoles::createUserRole($adminRoleData);
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

  public function updatePass($user_id){
    $pass = Request::get('pass', '');
    $newPass = Hash::make($pass);
    Users::updateUser($user_id, ['pass' => $newPass]);
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }

  public function activate($user_id){
    Users::updateUser($user_id, ['status' => 2]);
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }

  public function disable($user_id){
    Users::updateUser($user_id, ['status' => 3]);
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }



}

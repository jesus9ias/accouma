<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Request;
use Response;
use Hash;

use App\Helpers\Helpers;
use App\models\usersRolesModel as UsersRoles;

class userRolesController extends Controller{

  public function __construct(){
    $this->middleware('isLogued');
    $this->middleware('isAdmin');
  }

  public function index(){
    $usersRoles = UsersRoles::getUsersRoles();
    return Response::json([
      'result' => [
        'usersRoles' => $usersRoles
      ],
      'msg' => 'Success'
    ], 200);
  }

  public function get($user_id){
    $userRoles = UsersRoles::getRolesByUser($user_id);
    return Response::json([
      'result' => [
        'userRoles' => $userRoles
      ],
      'msg' => 'Success'
    ], 200);
  }

  public function asign($user_id, $role_slug){
    $userRoleData = [
      'user_id' => $user_id,
      'role_slug' => $role_slug,
      'date_created' => date("Y-m-d h:i:s"),
      'date_removed' => Null,
      'status' => 2
    ];
    $newUserRoleId = UsersRoles::createUserRole($userRoleData);
    return Response::json([
      'result' => [
        'newUserRoleId' => $newUserRoleId
      ],
      'msg' => 'Success'
    ], 200);
  }

  public function remove($user_id, $role_slug){
    $roles = UsersRoles::where('user_id', '=', $user_id)->where('role_slug', '=', $role_slug)->where('status', '=', 2)->get();
    $role_id = $roles[0]->id;
    $userRoleData = [
      'date_removed' => date("Y-m-d h:i:s"),
      'status' => 3
    ];
    UsersRoles::updateUserRole($role_id, $userRoleData);
    return Response::json([
      'result' => [],
      'msg' => 'Success'
    ], 200);
  }

}

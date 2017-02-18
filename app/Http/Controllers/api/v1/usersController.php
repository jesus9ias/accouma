<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller\api\v1;
use Request;
use Response;
use Hash;

use App\Helpers\Helpers;

use App\ModelServices\userServices;

use Event;
use App\Events\userCreated;
use App\Events\userActions;

class usersController extends apiBaseController {

  public function __construct() {
		$this->middleware('isLogued');
		$this->middleware('whatRole');
		$this->middleware('isAdmin', ['only' => ['create', 'update', 'activate', 'disable']]);
		$this->middleware('logger');
	}

  public function get() {
    $data = [
      'order_by' => Request::get('order_by', ''),
      'filters' => Request::get('filters', ''),
      'page' => Request::get('page', 0),
      'per_page' => Request::get('per_page', 0),
      'roles' => Request::get('roles', []),
      'user_id' => Request::get('user')->id
    ];

    $userService = new userServices();
    $users = $userService->getUsers($data);

    return Response::json([
      'result' => $users,
      'msg' => 'Success'
    ], 200);
  }

  public function edit($user_id) {
    $data = [
      'roles' => Request::get('roles', []),
    ];

    $userService = new userServices();
    $user = $userService->getUser($user_id, $data);

    if($user != null) {
      return Response::json([
        'result' => $user,
        'msg' => 'success'
      ], 200);
    }else{
      return Response::json([
        'result' => [],
        'msg' => 'Not Found'
      ], 404);
    }
  }

  public function update($user_id) {
    $data = [
      'names' => Request::get('names', ''),
      'last_names' => Request::get('last_names', ''),
    ];

    $userService = new userServices();
    $user = $userService->updateUser($user_id, $data);
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }

  public function create(){
    $data = [
      'names' => Request::get('names', ''),
      'last_names' => Request::get('last_names', ''),
      'nick' => Request::get('nick', ''),
      'email' => Request::get('email', ''),
      'pass' => Hash::make(Helpers::random_txt(8)),
      'date_created' => date("Y-m-d h:i:s"),
      'date_updated' => Null,
      'status' => 1
    ];

    $userService = new userServices();
    $newUserId = $userService->createUser($data);

    $make_admin = Request::get('make_admin', 0);
    $userCreated = Event::fire(new userCreated($newUserId, $make_admin));
    Event::fire(new userActions('users'));

    return Response::json([
      'result' => [
        'newUserId' => $newUserId,
        'newUserRoleId' => $userCreated[0]['newUserRoleId'],
        'newAdminRoleId' => $userCreated[0]['newAdminRoleId']
      ],
      'msg' => 'success'
    ], 200);
  }

  public function activate($user_id) {
    $userService = new userServices();
    $users = $userService->activateUser($user_id);

    Event::fire(new userActions('users'));
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }

  public function disable($user_id) {
    $userService = new userServices();
    $users = $userService->disableUser($user_id);

    Event::fire(new userActions('users'));
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }

}

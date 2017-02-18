<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller\api\v1;
use Request;
use Response;

use App\Helpers\Helpers;

use App\ModelServices\accountServices;

class accountsController extends apiBaseController {

  public function __construct() {
		$this->middleware('isLogued');
		$this->middleware('whatRole');
    //$this->middleware('isAdmin', ['only' => ['create', 'update', 'activate', 'disable']]);
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

    $accountService = new accountServices();
    $users = $accountService->getAccounts($data);

    return Response::json([
      'result' => $users,
      'msg' => 'Success'
    ], 200);
  }

  public function edit($account_id) {
    $data = [
      'roles' => Request::get('roles', []),
    ];

    $accountService = new accountServices();
    $user = $accountService->getAccount($account_id, $data);

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

  public function update($account_id) {
    $data = [
      'name' => Request::get('name', ''),
      'description' => Request::get('description', ''),
    ];

    $accountService = new accountServices();
    $user = $accountService->updateAccount($account_id, $data);
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }

  public function create(){
    $data = [
      'name' => Request::get('name', ''),
      'description' => Request::get('description', ''),
      'visibility' => Request::get('visibility', 1),
      'require_moderation' => Request::get('require_moderation', 1),
      'created_by' => Request::get('user')->id,
      'created_at' => date("Y-m-d h:i:s"),
      'status' => 2
    ];

    $accountService = new accountServices();
    $newAccountId = $accountService->createAccount($data);

    return Response::json([
      'result' => [
        'newAccountId' => $newAccountId,
      ],
      'msg' => 'success'
    ], 200);
  }

  public function activate($account_id) {
    $accountService = new accountServices();
    $users = $accountService->activateAccount($account_id);

    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }

  public function disable($account_id) {
    $accountService = new accountServices();
    $users = $accountService->disableAccount($account_id);

    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }

}

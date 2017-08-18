<?php
namespace App\Http\Controllers\api\v1;

use Request;

use App\Helpers\Responses;

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
    $accounts = $accountService->getAccounts($data);

    return Responses::success($accounts);
  }

  public function edit($account_id) {
    $data = [
      'roles' => Request::get('roles', []),
    ];

    $accountService = new accountServices();
    $account = $accountService->getAccount($account_id, $data);

    if ($account != null) {
      return Responses::success($account);
    } else {
      return Responses::notFound([]);
    }
  }

  public function update($account_id) {
    $data = [
      'name' => Request::get('name', ''),
      'description' => Request::get('description', ''),
    ];

    $accountService = new accountServices();
    $account = $accountService->updateAccount($account_id, $data);
    return Responses::success([]);
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

    return Responses::success([
      'newAccountId' => $newAccountId,
    ]);
  }

  public function activate($account_id) {
    $accountService = new accountServices();
    $account = $accountService->activateAccount($account_id);

    return Responses::success([]);
  }

  public function disable($account_id) {
    $accountService = new accountServices();
    $account = $accountService->disableAccount($account_id);

    return Responses::success([]);
  }

}

<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Request;
use Response;

use App\Helpers\Helpers;
use App\models\accountsModel as Accounts;
use App\models\accountsUsersModel as AccountsUsers;

class accountsController extends Controller{

  public function __construct(){
		$this->middleware('isLogued');
	}

  public function index(){
    $accounts = Accounts::getAccounts();
    return Response::json([
      'result' => [
        'rows' => $accounts
      ],
      'msg' => 'Success'
    ], 200);
  }

  public function edit($id){
    $account = Accounts::getAccount($id);
    if(count($account) == 1){
      return Response::json([
        'result' => [
          'row' => $account[0]
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
    $name = Request::get('name', '');
    $description = Request::get('description', '');

    $data = [
      'name' => $name,
      'description' => $description
    ];
    Accounts::updateAccount($id, $data);
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }

  public function create(){
    $name = Request::input('name', '');
    $description = Request::input('description', '');
    $user_id = Request::input('user_id', '');
    $date_created = date("Y-m-d H:i:s");
    $status = 2;

    $accountData = [
      'name' => $name,
      'description' => $description,
      'user_id' => $user_id,
      'date_created' => $date_created,
      'status' => $status
    ];
    $newAccountId = Accounts::createAccount($accountData);
    $accountUserData = [
      'account_id' => $newAccountId,
      'user_id' => $user_id,
      'date_added' => $date_created,
      'is_admin' => 1,
      'status' => $status
    ];
    $newAccountUserId = AccountsUsers::createAccountUser($accountUserData);
    return Response::json([
      'result' => [
        'newAccountId' => $newAccountId,
        'newAccountUserId' => $newAccountUserId
      ],
      'msg' => 'success'
    ], 200);
  }

  public function activate($id){
    Accounts::updateAccount($id, ['status' => 2]);
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }

  public function disable($id){
    Accounts::updateAccount($id, ['status' => 3]);
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }

  public function reasignAccountOwner($account_id){
    $user_id = Request::get('user_id', 0);
    $new_user_id = Request::get('new_user_id', 0);
    Accounts::where('id', '=', $account_id)
      ->where('user_id', '=', $user_id)
      ->where('status', '=', 2)
      ->update(['user_id' => $new_user_id]);
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }

  public function getUsers($account_id){
    $status = Request::get('status', 0);

    $users = AccountsUsers::where('account_id', '=', $account_id)
      ->join('users', 'users.id', '=', 'accounts_users.user_id')
      ->get();
    return Response::json([
      'result' => [
        'rows' => $users
      ],
      'msg' => 'success'
    ], 200);
  }

}

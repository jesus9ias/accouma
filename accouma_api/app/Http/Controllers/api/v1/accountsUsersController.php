<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Request;
use Response;

use App\Helpers\Helpers;
use App\models\accountsUsersModel as AccountsUsers;

class accountsUsersController extends Controller{

  public function index(){
    $accounts = AccountsUsers::getAccountUsers();
    return Response::json([
      'result' => [
        'rows' => $accounts
      ],
      'msg' => 'Success'
    ], 200);
  }

  public function indexAccount($account){
    $accounts = AccountsUsers::getAccountUsers();
    return Response::json([
      'result' => [
        'rows' => $accounts
      ],
      'msg' => 'Success'
    ], 200);
  }

  public function accountAccomulated($account){
    $accounts = AccountsUsers::getAccountUsers();
    return Response::json([
      'result' => [
        'rows' => $accounts
      ],
      'msg' => 'Success'
    ], 200);
  }

  public function editAccountUser($account,$id){
    $account = AccountsUsers::getAccountUser($id);
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

  public function updateAccountUser($account,$id){
    $names = Request::input('names', '');
    $description = Request::input('description', '');
    $user_id = Request::input('user_id', '');
    $date_created = date("Y-m-d H:i:s");
    $status = 2;

    $data = [
      'name' => $name,
      'description' => $description,
      'user_id' => $user_id,
      'date_created' => $date_created,
      'status' => $status
    ];
    AccountsUsers::updateAccountUser($id, $data);
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }

  public function createAccountUser($account_id){
    $user_id = Request::input('user_id', 0);
    $is_admin = Request::input('is_admin', 0);

    $data = [
      'account_id' => $account_id,
      'user_id' => $user_id,
      'date_added' => date("Y-m-d H:i:s"),
      'is_admin' => $is_admin,
      'status' => 2
    ];
    $newId = AccountsUsers::createAccountUser($data);
    return Response::json([
      'result' => [
        'newId' => $newId
      ],
      'msg' => 'success'
    ], 200);
  }

  public function recoveAccountUser($account,$id){
    AccountsUsers::activateAccountUser($id);
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }

  public function deleteAccountUser($account,$id){
    AccountsUsers::disableAccountUser($id);
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }

}

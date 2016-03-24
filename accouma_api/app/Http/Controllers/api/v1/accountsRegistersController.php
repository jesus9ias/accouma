<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Request;
use Response;

use App\Helpers\Helpers;
use App\models\accountsRegistersModel as accountsRegisters;

class accountsRegistersController extends Controller{

  public function index(){
    $accounts = accountsRegisters::getAccountRegisters();
    return Response::json([
      'result' => [
        'rows' => $accounts
      ],
      'msg' => 'Success'
    ], 200);
  }

  public function indexAccount($account){
    $accounts = accountsRegisters::getAccountRegisters();
    return Response::json([
      'result' => [
        'rows' => $accounts
      ],
      'msg' => 'Success'
    ], 200);
  }

  public function accountAccomulated($account){
    $accounts = accountsRegisters::getAccountRegisters();
    return Response::json([
      'result' => [
        'rows' => $accounts
      ],
      'msg' => 'Success'
    ], 200);
  }

  public function editAccountRegister($account,$id){
    $account = accountsRegisters::getAccountRegister($id);
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

  public function updateAccountRegister($account,$id){
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
    accountsRegisters::updateAccountRegister($id, $data);
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }

  public function createAccountRegister($account){
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
    $newId = accountsRegisters::createAccountRegister($data);
    return Response::json([
      'result' => [
        'newId' => $newId
      ],
      'msg' => 'success'
    ], 200);
  }



  public function recoveAccountRegister($account,$id){
    accountsRegisters::activateAccountRegister($id);
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }

  public function deleteAccountRegister($account,$id){
    accountsRegisters::disableAccountRegister($id);
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }
}

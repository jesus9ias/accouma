<?php

namespace App\Http\Controllers\api\v1;

use Request;

use App\Helpers\Responses;

use App\ModelServices\registerServices;

class registersController extends apiBaseController {

  public function __construct() {
		$this->middleware('isLogued');
		$this->middleware('whatRole');
		$this->middleware('logger');
	}

  public function get() {
    $data = [
      'order_by' => Request::get('order_by', ''),
      'filters' => Request::get('filters', ''),
      'page' => Request::get('page', 0),
      'per_page' => Request::get('per_page', 0),
      'roles' => Request::get('roles', []),
      'account_id' => Request::get('account_id', 0),
      'user_id' => Request::get('user')->id
    ];

    if ($data['account_id'] > 0) {
      if ($data['filters'] == '') {
        $data['filters'] = 'account_id:'.$data['account_id'];
      } else {
        $data['filters'] = $data['filters'].',account_id:'.$data['account_id'];
      }
    }

    $registerService = new registerServices();
    $registers = $registerService->getRegisters($data);

    return Responses::success($registers);
  }

  public function edit($register_id) {
    $data = [
      'roles' => Request::get('roles', []),
    ];

    $registerService = new registerServices();
    $register = $registerService->getRegister($register_id, $data);

    if ($register != null) {
      return Responses::success($register);
    } else {
      return Responses::notFound([]);
    }
  }

  public function update($register_id) {
    $data = [
      'description' => Request::get('description', ''),
      'ammount_in' => Request::get('ammount_in', 0),
      'ammount_out' => Request::get('ammount_out', 0),
    ];

    $registerService = new registerServices();
    $register = $registerService->updateRegister($register_id, $data);

    return Responses::success([]);
  }

  public function create() {
    $data = [
      'account_id' => Request::get('account_id', 0),
      'concept_id' => Request::get('concept_id', 0),
      'date_register' => Request::get('date_register', date("Y-m-d h:i:s")),
      'ammount_in' => Request::get('ammount_in', 0),
      'ammount_out' => Request::get('ammount_out', 0),
      'description' => Request::get('description', ''),
      'type' => Request::get('type', 1),
      'created_by' => Request::get('user')->id,
      'created_at' => date("Y-m-d h:i:s"),
      'status' => 2
    ];

    $registerService = new registerServices();
    $newRegisterId = $registerService->createRegister($data);

    return Responses::success([
      'newRegisterId' => $newRegisterId,
    ]);
  }

  public function activate($register_id) {
    $registerService = new registerServices();
    $registers = $registerService->activateRegister($register_id);

    return Responses::success([]);
  }

  public function disable($register_id) {
    $registerService = new registerServices();
    $registers = $registerService->disableRegister($register_id);

    return Responses::success([]);
  }

}

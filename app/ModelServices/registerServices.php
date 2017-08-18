<?php

namespace App\ModelServices;

use DB;

use App\ModelServices\baseServices;
use App\models\registersModel as Registers;

class registerServices extends baseServices {

  protected $fields = [
    'USER' => [
      'account_registers.id',
      'account_registers.account_id',
      'account_registers.description',
      'account_registers.concept_id',
      'account_registers.created_by',
      'account_registers.created_at',
      'account_registers.date_register',
      'account_registers.ammount_out',
      'account_registers.ammount_out',
      'account_registers.type',
      'account_registers.status',
      'concepts.description as concept_description',
      'users.names as user_names',
      'users.last_names as user_last_names',
      'users.nick as user_nick',
    ],
    'ADMIN' => []
  ];

  public function getRegisters($data = []) {
    $selected_fields = $this->fields['USER'];
    if (array_key_exists('roles', $data)) {
      $selected_fields = $this->getFields($this->fields, $data['roles']);
    }

    $rows = Registers::select($selected_fields)
      ->join('users', 'users.id', '=', 'account_registers.created_by')
      ->join('concepts', 'concepts.id', '=', 'account_registers.concept_id');

    if (array_key_exists('order_by', $data)) {
      $order_by = $this->ordering($data['order_by']);
      foreach($order_by as $n => $v) {
        $rows = $rows->orderBy($n, $v);
      }
    }

    if (array_key_exists('filters', $data)) {
      $filters = $this->filtering($data['filters']);
      foreach($filters as $n => $v) {
        $rows = $rows->where($n, '=' , $v);
      }
    }

    if (array_key_exists('page', $data) && array_key_exists('per_page', $data)) {
      $pagination = $this->paginate($data['page'], $data['per_page'], $data['user_id'], $data['filters'], $rows, 'users');
      if ($data['page'] > 0 && $data['per_page'] > 0) {
        $rows = $rows->skip($pagination['skip'])->take($data['per_page']);
      }
    }

    $rows = $rows->get();

    return [
      'rows' => $rows,
      'tot_rows' =>$pagination['tot_rows'],
      'tot_pages' =>$pagination['tot_pages']
    ];
  }

  public function getRegister($id, $data ) {
    $selected_fields = $this->fields['USER'];
    if (array_key_exists('roles', $data)) {
      $selected_fields = $this->getFields($this->fields, $data['roles']);
    }

    $row = Registers::select($selected_fields)->where('account_registers.id', '=', $id)
      ->join('users', 'users.id', '=', 'account_registers.created_by')
      ->join('concepts', 'concepts.id', '=', 'account_registers.concept_id')
      ->get();

    if (count($row) == 1) {
      return $row[0];
    } else {
      return null;
    }
  }

  public function updateRegister($id, $data = []) {
    Registers::where('id', '=', $id)->update($data);
  }

  public function createRegister($data = []) {
    $newRegisterId = Registers::insertGetId($data);
    return $newRegisterId;
  }

  public function activateRegister($id) {
    Registers::where('id', '=', $id)->update(['status' => 2]);
  }

  public function disableRegister($id) {
    Registers::where('id', '=', $id)->update(['status' => 3]);
  }
}

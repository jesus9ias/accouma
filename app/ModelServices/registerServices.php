<?php

namespace App\ModelServices;

use DB;

use App\ModelServices\baseServices;
use App\models\registersModel as Registers;

class registerServices extends baseServices {

  protected $fields = [
    'USER' => [
      'id',
      'account_id',
      'description',
      'concept_id',
      'created_by',
      'created_at',
      'date_register',
      'ammount_out',
      'ammount_out',
      'type',
      'status'
    ],
    'ADMIN' => []
  ];

  public function getRegisters($data = []) {
    $selected_fields = $this->fields['USER'];
    if (array_key_exists('roles', $data)) {
      $selected_fields = $this->getFields($this->fields, $data['roles']);
    }

    $rows = Registers::select($selected_fields);

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
      $rows = $rows->skip($pagination['skip'])->take($data['per_page']);
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

    $row = Registers::select($selected_fields)->where('id', '=', $id)->get();

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

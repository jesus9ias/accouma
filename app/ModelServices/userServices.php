<?php

namespace App\ModelServices;

use DB;

use App\ModelServices\baseServices;
use App\models\usersModel as Users;

class userServices extends baseServices {

  protected $fields = [
    'USER' => [
      'id',
      'names',
      'last_names',
      'email',
      'status'
    ],
    'ADMIN' => [
      'date_created',
      'date_updated'
    ]
  ];

  public function getUsers($data = []) {
    $selected_fields = $this->fields['USER'];
    if (array_key_exists('roles', $data)) {
      $selected_fields = $this->getFields($this->fields, $data['roles']);
    }

    $rows = Users::select($selected_fields);

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

  public function getUser($id, $data ) {
    $selected_fields = $this->fields['USER'];
    if (array_key_exists('roles', $data)) {
      $selected_fields = $this->getFields($this->fields, $data['roles']);
    }

    $row = Users::select($selected_fields)->where('id', '=', $id)->get();

    if (count($row) == 1) {
      return $row[0];
    } else {
      return null;
    }
  }

  public function updateUser($id, $data = []) {
    Users::where('id', '=', $id)->update($data);
  }

  public function createUser($data = []) {
    return Users::insertGetId($data);
  }

  public function activateUser($id) {
    Users::where('id', '=', $id)->update(['status' => 2]);
  }

  public function disableUser($id) {
    Users::where('id', '=', $id)->update(['status' => 3]);
  }
}

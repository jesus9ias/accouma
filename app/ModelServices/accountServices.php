<?php

namespace App\ModelServices;

use DB;

use App\ModelServices\baseServices;
use App\models\accountsModel as Accounts;
use App\models\accountsMembersModel as AccountsMembers;

class accountServices extends baseServices {

  protected $fields = [
    'USER' => [
      'id',
      'name',
      'description',
      'visibility',
      'require_moderation',
      'created_by',
      'created_at',
      'status'
    ],
    'ADMIN' => []
  ];

  public function getAccounts($data = []) {
    $selected_fields = $this->fields['USER'];
    if (array_key_exists('roles', $data)) {
      $selected_fields = $this->getFields($this->fields, $data['roles']);
    }

    $rows = Accounts::select($selected_fields);

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

  public function getAccount($id, $data ) {
    $selected_fields = $this->fields['USER'];
    if (array_key_exists('roles', $data)) {
      $selected_fields = $this->getFields($this->fields, $data['roles']);
    }

    $row = Accounts::select($selected_fields)->where('id', '=', $id)->get();

    if (count($row) == 1) {
      return $row[0];
    } else {
      return null;
    }
  }

  public function updateAccount($id, $data = []) {
    Accounts::where('id', '=', $id)->update($data);
  }

  public function createAccount($data = []) {
    $newAccountId = Accounts::insertGetId($data);
    $this->createNewAccountOwner($newAccountId, $data['created_by']);
    return $newAccountId;
  }

  public function activateAccount($id) {
    Accounts::where('id', '=', $id)->update(['status' => 2]);
  }

  public function disableAccount($id) {
    Accounts::where('id', '=', $id)->update(['status' => 3]);
  }

  private function createNewAccountOwner($id, $user_id) {
    AccountsMembers::insert([
      'account_id' => $id,
      'user_id' => $user_id,
      'created_at' => date("Y-m-d h:i:s"),
      'created_by' => $user_id,
      'is_owner' => 1,
      'is_admin' => 1,
      'is_editor' => 1,
      'status' => 2,
    ]);
  }
}

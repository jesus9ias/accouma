<?php

namespace App\ModelServices;

use DB;

use App\ModelServices\baseServices;
use App\models\conceptsModel as Concepts;

class conceptServices extends baseServices {

  protected $fields = [
    'USER' => [
      'id',
      'description',
      'created_by',
      'created_at',
    ],
    'ADMIN' => []
  ];

  public function getConcepts($data = []) {
    $selected_fields = $this->fields['USER'];
    if (array_key_exists('roles', $data)) {
      $selected_fields = $this->getFields($this->fields, $data['roles']);
    }

    $rows = Concepts::select($selected_fields);

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

    if (!$this->hasPermission($data['roles'], 'ADMIN')) {
      $rows = $rows->where('created_by', '=' , $data['user_id']);
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
      'tot_rows' => $pagination['tot_rows'],
      'tot_pages' => $pagination['tot_pages']
    ];
  }

  public function createConcept($data = []) {
    return Concepts::insertGetId($data);
  }
}

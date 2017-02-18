<?php

namespace App\ModelServices;

use Redis;

class baseServices {

  public function filtering($filters) {
    $filter = [];

    if ($filters != '') {
      $filters = explode(',', $filters);
      foreach($filters as $n => $v) {
        $f = explode(':', $v);
        $filter[array_shift($f)] = $f;
      }
    }

    return $filter;
  }

  public function ordering($order_by) {
    $order = [];

    if ($order_by != '') {
      $orders = explode(',', $order_by);
      foreach($orders as $n => $v) {
        $order_dir = explode(':', $v);
        $order[$order_dir[0]] = $order_dir[1];
      }
    }

    return $order;
  }

  public function paginate($page = 0, $per_page = 0, $user_id = 0, $filters = '', $rows = [], $table) {
    $tot_rows = 0;
    $tot_pages = 0;
    $skip = 0;

    if ($page > 0 && $per_page > 0) {

      $redis_hash = md5($user_id.':'.$per_page.':'.$filters);
      $exists_redis_hash = Redis::hexists('paginate:'.$table, $redis_hash);

      if($exists_redis_hash){
        $redis_paginate = json_decode(Redis::hget('paginate:'.$table, $redis_hash), 1);
        $tot_rows = $redis_paginate['tot_rows'];
        $tot_pages = $redis_paginate['tot_pages'];
        $skip = ($page * $per_page) - $per_page;
      }else{
        $tot_rows = $rows->count();
        $tot_rows = (is_numeric($tot_rows))? $tot_rows : 0;
        $tot_pages = ($tot_rows - ($tot_rows % $per_page)) / $per_page;
        $tot_pages = ($tot_rows % $per_page > 0)? ++$tot_pages : $tot_pages;
        $tot_pages = ($tot_rows <= $per_page)? 1 : $tot_pages;
        $skip = ($page * $per_page) - $per_page;

        $redis_paginate = json_encode(compact('tot_rows', 'tot_pages'));

        Redis::hset('paginate:'.$table, $redis_hash, $redis_paginate);
      }
    } else {
      $tot_rows = $rows->count();
      $tot_pages = 1;
    }

    return compact('tot_rows', 'tot_pages', 'skip');
  }

  public function getFields($fields, $roles) {
    $role_fields = [];
    foreach ($roles as $k => $v) {
      $role_fields = array_unique(array_merge($role_fields, $fields[$v]));
    }
    return $role_fields;
  }

}

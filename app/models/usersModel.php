<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class usersModel extends Model{
  protected $table = 'users';
  public $timestamps = false;

  /*public function scopeGetUsers($query, $params = []){
    if(array_key_exists('fields', $params)){
      $query->select($params['fields']);
    }
    if(array_key_exists('filters', $params)){
      $query = $this->filtering($query, $params['filters']);
    }
    if(array_key_exists('paginate', $params) && $params['paginate']['take'] > 0){
      $query->skip($params['paginate']['skip'])->take($params['paginate']['take']);
    }
    if($params['order_by'] != [] && is_array($params['order_by'])){
      foreach($params['order_by'] as $n => $v){
        $query->orderBy($n, $v);
      }
    }
    return $query->get();
  }

  public function scopeCountUsers($query, $params = []){
    if(array_key_exists('filters', $params)){
      $query = $this->filtering($query, $params['filters']);
    }
    return $query->count();
  }

  public function scopeGetUser($query, $id, $params = []){
    if(array_key_exists('fields', $params)){
      $query = $query->select($params['fields']);
    }
    return $query->where('id', '=', $id)->get();
  }

  public function scopeCreateUser($query, $data = []){
    return $query->insertGetId($data);
  }

  public function scopeUpdateUser($query, $id, $data = []){
    return $query->where('id', '=', $id)->update($data);
  }


  protected function filtering($query, $filters){
    if(array_key_exists('names', $filters)){
      $query->where('names', 'like', '%'.$filters['names'][0].'%');
    }
    if(array_key_exists('status', $filters)){
      $query->whereIn('status', $filters['status']);
    }
    return $query;
  }*/

}

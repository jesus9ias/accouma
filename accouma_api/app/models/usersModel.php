<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class usersModel extends Model{
  protected $table = 'users';
  public $timestamps = false;

  public function scopeGetUsers($query, $params = []){
    if(array_key_exists('fields', $params)){
      $query = $query->select($params['fields']);
    }
    if(array_key_exists('paginate', $params) && $params['paginate']['take'] > 0){
      $query = $query->skip($params['paginate']['skip'])->take($params['paginate']['take']);
    }
    return $query->get();
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

}

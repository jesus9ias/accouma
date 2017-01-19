<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class accountsModel extends Model{
  protected $table = 'accounts';
  public $timestamps = false;

  public function scopeGetAccounts($query, $params = []){
    $q = $query;
    if(array_key_exists('paginate', $params) && $params['paginate']['take'] > 0){
      $q = $q->skip($params['paginate']['skip'])->take($params['paginate']['take']);
    }
    return $q->get();
  }

  public function scopeGetAccount($query, $id, $fields = []){
    return $query->where('id', '=', $id)->get();
  }

  public function scopeCreateAccount($query, $data = []){
    return $query->insertGetId($data);
  }

  public function scopeUpdateAccount($query, $id, $data = []){
    return $query->where('id', '=', $id)->update($data);
  }

}

<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class accountsModel extends Model{
  protected $table = 'accounts';
  public $timestamps = false;

  public function scopeGetAccounts($query, $fields = [], $filters = []){
    return $query->get();
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

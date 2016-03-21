<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class accountsUsersModel extends Model{
  protected $table = 'accounts_users';
  public $timestamps = false;

  public function scopeGetAccountUsers($query){
    return $query->get();
  }

  public function scopeGetAccountUser($query, $id){
    return $query->where('id', '=', $id)->get();
  }

  public function scopeCreateAccountUser($query, $data = []){
    return $query->insertGetId($data);
  }

  public function scopeUpdateAccountUser($query, $id, $data = []){
    return $query->where('id', '=', $id)->update($data);
  }
}

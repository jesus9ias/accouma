<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class usersModel extends Model{
  protected $table = 'users';
  public $timestamps = false;

  public function scopeGetUsers($query, $fields = []){
    return $query->get();
  }

  public function scopeGetUser($query, $id, $fields = []){
    return $query->where('id', '=', $id)->get();
  }

  public function scopeCreateUser($query, $data = []){
    return $query->insertGetId($data);
  }

  public function scopeUpdateUser($query, $id, $data = []){
    return $query->where('id', '=', $id)->update($data);
  }

  public function scopeUpdateUserPass($query, $id, $newPass = ''){
    return $query->where('id', '=', $id)->update(['pass' => $newPass]);
  }

  public function scopeActivateUser($query, $id){
    return $query->where('id', '=', $id)->update(['status' => 2]);
  }

  public function scopeDisableUser($query, $id){
    return $query->where('id', '=', $id)->update(['status' => 3]);
  }

  public function scopeTokenUser($query, $id, $token){
    return $query->where('id', '=', $id)->update(['token' => $token]);
  }
}

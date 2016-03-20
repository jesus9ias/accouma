<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class usersModel extends Model{
  protected $table = 'users';
  public $timestamps = false;

  public function scopeGetUsers($query){
    return $query->get();
  }

  public function scopeGetUser($query, $id){
    return $query->where('id', '=', $id)->get();
  }
}

<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class rolesModel extends Model{
  protected $table = 'roles';
  public $timestamps = false;

  public function scopeGetRoles($query){
    return $query->get();
  }

  public function scopeGetRole($query, $id){
    return $query->where('id', '=', $id)->get();
  }

  public function scopeCreateRole($query, $data = []){
    return $query->insertGetId($data);
  }

  public function scopeUpdateRole($query, $id, $data = []){
    return $query->where('id', '=', $id)->update($data);
  }
}

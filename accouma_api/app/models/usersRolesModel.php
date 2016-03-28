<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class usersRolesModel extends Model{
  protected $table = 'user_roles';
  public $timestamps = false;

  public function scopeGetUsersRoles($query){
    return $query->get();
  }

  public function scopeGetUserRole($query, $id){
    return $query->where('id', '=', $id)->get();
  }

  public function scopeGetUsersByRole($query, $slug, $status = 2){
    return $query->where('role_slug', '=', $slug)->where('status', '=', $status)->get();
  }

  public function scopeGetRolesByUser($query, $user, $status = 2){
    return $query->where('user_id', '=', $user)->where('status', '=', $status)->get();
  }

  public function scopeGetRoleByUser($query, $user, $role, $status = 2){
    return $query->where('user_id', '=', $user)->where('role_slug', '=', $role)->where('status', '=', $status)->get();
  }

  public function scopeCreateUserRole($query, $data = []){
    return $query->insertGetId($data);
  }

  public function scopeUpdateUserRole($query, $id, $data = []){
    return $query->where('id', '=', $id)->update($data);
  }

  public function scopeDisableUserRole($query, $id){
    return $query->where('id', '=', $id)->update(['status' => 3]);
  }
}

<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class accountsRegistersModel extends Model{
  protected $table = 'accounts_registers';
  public $timestamps = false;

  public function scopeGetAccountRegisters($query){
    return $query->get();
  }

  public function scopeGetAccountRegister($query, $id){
    return $query->where('id', '=', $id)->get();
  }

  public function scopeCreateAccountRegister($query, $data = []){
    return $query->insertGetId($data);
  }

  public function scopeUpdateAccountRegister($query, $id, $data = []){
    return $query->where('id', '=', $id)->update($data);
  }
}

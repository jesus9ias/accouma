<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class logsModel extends Model{
  protected $table = 'logs';
  public $timestamps = false;

  public function scopeGetlogs($query){
    return $query->get();
  }

  public function scopeGetlog($query, $id){
    return $query->where('id', '=', $id)->get();
  }

  public function scopeCreatelog($query, $data = []){
    return $query->insertGetId($data);
  }

  public function scopeUpdatelog($query, $id, $data = []){
    return $query->where('id', '=', $id)->update($data);
  }
}

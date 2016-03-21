<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class conceptsModel extends Model{
  protected $table = 'concepts';
  public $timestamps = false;

  public function scopeGetConcepts($query){
    return $query->get();
  }

  public function scopeGetConcept($query, $id){
    return $query->where('id', '=', $id)->get();
  }

  public function scopeCreateConcept($query, $data = []){
    return $query->insertGetId($data);
  }

  public function scopeUpdateConcept($query, $id, $data = []){
    return $query->where('id', '=', $id)->update($data);
  }
}

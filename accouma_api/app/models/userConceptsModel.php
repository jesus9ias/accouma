<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class userConceptsModel extends Model{
  protected $table = 'concepts';
  public $timestamps = false;

  public function scopeGetUserConcepts($query){
    return $query->get();
  }

  public function scopeGetUserConcept($query, $id){
    return $query->where('id', '=', $id)->get();
  }

  public function scopeCreateUserConcept($query, $data = []){
    return $query->insertGetId($data);
  }

  public function scopeUpdateUserConcept($query, $id, $data = []){
    return $query->where('id', '=', $id)->update($data);
  }
}

<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class userTokensModel extends Model{
  protected $table = 'users_tokens';
  public $timestamps = false;

  public function scopeGetUserTokens($query, $fields = [], $filters = []){
    return $query->get();
  }

  public function scopeGetUserToken($query, $id, $fields = []){
    return $query->where('id', '=', $id)->get();
  }

  public function scopeCreateUserToken($query, $data = []){
    return $query->insertGetId($data);
  }

  public function scopeUpdateUserToken($query, $id = 0, $data = []){
    return $query->where('id', '=', $id)->update($data);
  }

}

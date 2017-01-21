<?php

namespace App\ModelServices;

use DB;

use App\models\usersModel as Users;

class userServices {

  protected $request = [];

  protected $fields = [
    'USER' => [
      'id',
      'names',
      'last_names',
      'email',
      'status'
    ],
    'ADMIN' => [
      'id',
      'names',
      'last_names',
      'email',
      'date_created',
      'date_updated',
      'status'
    ]
  ];

  public function __construct($request){
		$this->request = $request;
	}

  public function getUsers(){
    return Users::select($this->fields['USER'])->get();
  }
}

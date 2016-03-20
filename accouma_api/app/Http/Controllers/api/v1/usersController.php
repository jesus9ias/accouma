<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\models\usersModel as users;

class usersController extends Controller{
  public function index(){
    $users = users::getUsers();
    return $users;
  }
}

<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class loginController extends Controller{
    public function login(){
      return array('ok' => 1);
    }
}

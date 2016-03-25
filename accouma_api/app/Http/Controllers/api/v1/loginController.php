<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Request;
use Response;
use Hash;

use App\Helpers\Helpers;
use App\models\usersModel as users;
use App\models\usersTokensModel as usersTokens;

class loginController extends Controller{
    public function login(){
      $usr = Request::input('usr', '');
      $pass = Request::input('pass', '');

      $user = users::where('user', '=', $usr)->get();
      if(count($user) == 1){
        $apass = $user[0]->pass;
        $id= $user[0]->id;

        if(Hash::check($pass, $apass)){

          $token = Helpers::random_txt(64);
          users::updateUser($id, ['token' => $token]);
          return Response::json([
            'result' => [
              'id' => $id,
              'token' => $token
            ],
            'msg' => 'Success'
          ], 200);
        }else{
          return Response::json([
            'result' => [],
            'msg' => 'Not Found'
          ], 404);
        }
      }else{
        return Response::json([
          'result' => [],
          'msg' => 'Not Found'
        ], 404);
      }
    }

    public function isLogued(){
      $id = Request::get('id', 0);
      $token = Request::get('token', '');

      $user = users::where('id', '=', $id)
        ->where('token', '=', $token)
        ->get();
      if(count($user) == 1){
        return Response::json([
          'result' => [
            'logued' => true
          ],
          'msg' => 'Is logued',
        ], 200);
      }else{
        return Response::json([
          'result' => [
            'logued' => false
          ],
          'msg' => 'Not logued'
        ], 200);
      }
    }

    public function close(){
      $id = Request::get('id', 0);
      $token = Request::get('token', '');

      $user = users::where('id', '=', $id)
        ->where('token', '=', $token)
        ->get();
      if(count($user) == 1){
        users::updateUser($id, ['token' => $token]);
        return Response::json([
          'result' => [],
          'msg' => 'Success',
        ], 200);
      }else{
        return Response::json([
          'result' => [],
          'msg' => 'Not Found'
        ], 404);
      }
    }

}

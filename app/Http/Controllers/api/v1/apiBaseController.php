<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;

class apiBaseController extends Controller{

  public function hasPermission($user_permissions, $permission_need) {
    return in_array($permission_need, $user_permissions);
  }

}

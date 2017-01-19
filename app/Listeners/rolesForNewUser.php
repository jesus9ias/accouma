<?php

namespace App\Listeners;

use App\Events\userCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\models\usersRolesModel as UsersRoles;

class rolesForNewUser{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(){
        //
    }

    /**
     * Handle the event.
     *
     * @param  userCreated  $event
     * @return void
     */
    public function handle(userCreated $event){
      $userRoleData = [
        'user_id' => $event->user_id,
        'role_slug' => 'USER',
        'date_created' => date("Y-m-d h:i:s"),
        'date_removed' => Null,
        'status' => 2
      ];
      $newUserRoleId = UsersRoles::createUserRole($userRoleData);

      if($event->make_admin == 1){
        $adminRoleData = [
          'user_id' => $event->user_id,
          'role_slug' => 'ADMIN',
          'date_created' => date("Y-m-d h:i:s"),
          'date_removed' => Null,
          'status' => 2
        ];
        $newAdminRoleId = UsersRoles::createUserRole($adminRoleData);
      }else{
        $newAdminRoleId = 0;
      }

      return compact('newUserRoleId','newAdminRoleId');
    }
}

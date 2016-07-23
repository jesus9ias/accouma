<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Request;
use Response;
use Hash;
use DB;

use App\Helpers\Helpers;
use App\models\usersModel as Users;
use App\models\usersRolesModel as UsersRoles;

use Event;
use App\Events\userCreated;

class usersController extends Controller{

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

  public function __construct(){
		$this->middleware('isLogued');
		$this->middleware('whatRole');
		$this->middleware('isAdmin', ['only' => ['create', 'update', 'activate', 'disable']]);
		$this->middleware('logger');
	}

  public function get(){
    $order = Request::get('order', '');
    $fields = $this->getFields('get', Request::get('filteredRoles', []));

    $pagination = $this->paginate(
                        Request::get('page', 0),
                        Request::get('per_page', 0)
                      );

    $order_by = $this->ordering(Request::get('order_by', ''));

    $users = Users::getUsers([
      'paginate' => [
        'skip' => $pagination['skip'],
        'take' => $pagination['per_page']
      ],
      'fields' => $fields,
      'order_by' => $order_by
    ]);

    return Response::json([
      'result' => [
        'rows' => $users
      ],
      'msg' => 'Success',
      'tot_pages' => $pagination['tot_pages'],
      'tot_rows' => $pagination['tot_rows']
    ], 200);
  }

  public function edit($user_id){
    $fields = $this->getFields('edit', Request::get('filteredRoles', []));
    $user = Users::getUser(
      $user_id,
      [
        'fields' => $fields
      ]
    );

    if(count($user) == 1){
      return Response::json([
        'result' => [
          'row' => $user[0]
        ],
        'msg' => 'success'
      ], 200);
    }else{
      return Response::json([
        'result' => [],
        'msg' => 'Not Found'
      ], 404);
    }
  }

  public function update($user_id){
    $names = Request::get('names', '');
    $last_names = Request::get('last_names', '');
    $data = ['names' => $names, 'last_names' => $last_names];
    Users::updateUser($user_id, $data);
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }

  public function create(){
    $names = Request::get('names', '');
    $last_names = Request::get('last_names', '');
    $user = Request::get('user_name', '');
    $email = Request::get('email', '');
    $pass = Hash::make(Helpers::random_txt(8));
    $date_created = date("Y-m-d h:i:s");
    $date_updated = Null;
    $status = 1;

    $userData = compact(
      'names',
      'last_names',
      'user',
      'email',
      'pass',
      'date_created',
      'date_updated',
      'status'
    );

    $newUserId = Users::createUser($userData);

    $make_admin = Request::get('make_admin', 0);

    $userCreated = Event::fire(new userCreated($newUserId, $make_admin));

    return Response::json([
      'result' => [
        'newUserId' => $newUserId,
        'newUserRoleId' => $userCreated[0]['newUserRoleId'],
        'newAdminRoleId' => $userCreated[0]['newAdminRoleId']
      ],
      'msg' => 'success'
    ], 200);
  }

  public function activate($user_id){
    Users::updateUser($user_id, ['status' => 2]);
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }

  public function disable($user_id){
    Users::updateUser($user_id, ['status' => 3]);
    return Response::json([
      'result' => [],
      'msg' => 'success'
    ], 200);
  }

  protected function getFields($method, $roles){
    $r = $this->fields['USER'];

    if(($method == 'get' || $method == 'edit' ) && in_array('ADMIN', $roles)){
      $r = $this->fields['ADMIN'];
    }else{
      $r = $this->fields['USER'];
    }

    return $r;
  }

  protected function paginate($page, $per_page){
    $skip = 0;
    $tot_pages = 0;
    $tot_rows = 0;

		if($page > 0 && $per_page > 0){
			$tot_rows = DB::table('users')->count();
			$tot_pages = ($tot_rows - ($tot_rows % $per_page)) / $per_page;
			$tot_pages = ($tot_rows % $per_page > 0)? ++$tot_pages : $tot_pages;
			$tot_pages = ($tot_rows <= $per_page)? 1 : $tot_pages;
			$skip = ($page * $per_page) - $per_page;
		}

		return compact('skip', 'tot_pages', 'tot_rows', 'per_page');
  }

  protected function ordering($order_by){
    $order = [];

    $orders = explode(',', $order_by);
    foreach($orders as $n => $v){
      $order_dir = explode(':', $v);
      $order[$order_dir[0]] = $order_dir[1];
    }

    return $order;
  }



}

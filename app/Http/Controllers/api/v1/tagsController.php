<?php

namespace App\Http\Controllers\api\v1;

use Request;

use App\Helpers\Responses;

use App\ModelServices\tagServices;

class tagsController extends apiBaseController {

  public function __construct() {
    $this->middleware('isLogued');
    $this->middleware('whatRole');
  }

  public function get() {
    $data = [
      'order_by' => Request::get('order_by', ''),
      'filters' => Request::get('filters', ''),
      'page' => Request::get('page', 0),
      'per_page' => Request::get('per_page', 0),
      'roles' => Request::get('roles', []),
      'user_id' => Request::get('user')->id
    ];

    $tagService = new tagServices();
    $tags = $tagService->getTags($data);

    return Responses::success($tags);
  }

  public function create() {
    $data = [
      'name' => Request::get('name', ''),
      'created_by' => Request::get('user')->id,
      'created_at' => date("Y-m-d h:i:s"),
    ];

    $tagService = new tagServices();
    $newTagId = $tagService->createTag($data);

    return Responses::success([
      'newTagId' => $newTagId,
    ]);
  }

}

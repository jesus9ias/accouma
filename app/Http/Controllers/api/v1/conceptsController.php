<?php

namespace App\Http\Controllers\api\v1;

use Request;

use App\Helpers\Responses;

use App\ModelServices\conceptServices;

class conceptsController extends apiBaseController {

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

    $conceptService = new conceptServices();
    $concepts = $conceptService->getConcepts($data);

    return Responses::success($concepts);
  }

  public function create() {
    $data = [
      'description' => Request::get('description', ''),
      'created_by' => Request::get('user')->id,
      'created_at' => date("Y-m-d h:i:s"),
    ];

    $conceptService = new conceptServices();
    $newConceptId = $conceptService->createConcept($data);

    return Responses::success([
      'newConceptId' => $newConceptId,
    ]);
  }

}

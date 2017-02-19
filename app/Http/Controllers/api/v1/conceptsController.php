<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Request;
use Response;

use App\Helpers\Helpers;

use App\ModelServices\conceptServices;

class conceptsController extends Controller {

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

    return Response::json([
      'result' => $concepts,
      'msg' => 'Success'
    ], 200);
  }

  public function create() {
    $data = [
      'description' => Request::get('description', ''),
      'created_by' => Request::get('user')->id,
      'created_at' => date("Y-m-d h:i:s"),
    ];

    $conceptService = new conceptServices();
    $newConceptId = $conceptService->createConcept($data);

    return Response::json([
      'result' => [
        'newConceptId' => $newConceptId,
      ],
      'msg' => 'success'
    ], 200);
  }

}

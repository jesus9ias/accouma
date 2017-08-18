<?php namespace App\Helpers;

use Response;

class Responses {

	public static function success($data) {
    return Response::json([
      'result' => $data,
      'msg' => 'Success'
    ], 200);
	}

  public static function notFound($data) {
    return Response::json([
      'result' => $data,
      'msg' => 'Not Found'
    ], 404);
	}

}

<?php

namespace App\Http\Middleware\basic;

use Closure;
use Response;
use App\models\logsModel as Logs;

class loggerMiddleware{

    public function handle($request, Closure $next){
      $segment = $request->segment(3);
      Logs::createLog([
        'user_id' => $request->get('id', 0),
        'section' => $segment,
        'action' => '',
        'date_created' => date("Y-m-d H:i:s")
      ]);
      return $next($request);
    }
}

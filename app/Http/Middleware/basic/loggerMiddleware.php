<?php

namespace App\Http\Middleware\basic;

use Closure;
use Response;
use App\models\logsModel as Logs;

class loggerMiddleware{

    public function handle($request, Closure $next){
      $user = $request->get('user');
      $path = $request->path();
      Logs::createLog([
        'user_id' => $user->id,
        'path' => $path,
        'date_created' => date("Y-m-d H:i:s")
      ]);
      return $next($request);
    }
}

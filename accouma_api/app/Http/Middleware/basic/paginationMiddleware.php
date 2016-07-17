<?php

namespace App\Http\Middleware\basic;

use Closure;
use Response;
use DB;

class paginationMiddleware{

	public function handle($request, Closure $next){
		$segment = $request->segment(3);
		$page = $request->get('page', 0);
		$per_page = $request->get('per_page', 0);
		$q = '';
		if($page > 0 && $per_page > 0){
			if($segment == 'users'){
				$q = DB::table('users')->count();
			}
			if($segment == 'accounts'){
				$q = DB::table('accounts')->count();
			}
			$tot_pages = ($q - ($q % $per_page)) / $per_page;
			$tot_pages = ($q % $per_page > 0)? ++$tot_pages : $tot_pages;
			$tot_pages = ($q <= $per_page)? 1 : $tot_pages;
			$skip = ($page * $per_page) - $per_page;
		}else{
			$skip = 0;
			$per_page = 0;
			$tot_pages = 0;
		}

		$request->attributes->add(['skip' => $skip]);
		$request->attributes->add(['take' => $per_page]);
		$request->attributes->add(['tot_pages' => $tot_pages]);
		$request->attributes->add(['tot_rows' => $q]);

		return $next($request);
	}

}

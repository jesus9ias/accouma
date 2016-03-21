<?php namespace App\Helpers;

use Request;
use Route;
use DB;

class Helpers{

	public static function random_txt($num){
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
		$txt = "";
		for($i=0; $i< $num; $i++){
			$txt .= substr($chars,rand(0,strlen($chars)),1);
		}
		return $txt;
	}

}

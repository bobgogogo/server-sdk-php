<?php
namespace RC;

use RC\HTTP\Request;

final class User
{
	public static function __callStatic($name,$arguments)
	{
		$name = str_replace('_', '/', $name);
		$res = Request::postCurl(strtolower(getName(__CLASS__)).'/'.$name,$arguments[0]);
		return $res;
	}
	
}
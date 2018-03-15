<?php
namespace RC;

use RC\HTTP\Request;

final class User
{

	public static function __callStatic($name,$arguments)
	{
		$name = str_replace('_', '/', $name);
		$res = Request::postCurl(strtolower(self::getName()).'/'.$name,$arguments[0]);
		return $res;
	}

	private static function getName()
	{
		return array_pop(explode('\\', __CLASS__));
	}

}
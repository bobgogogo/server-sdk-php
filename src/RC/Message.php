<?php
namespace RC;

use RC\HTTP\Request;

final class Message
{
	public static function __callStatic($name,$arguments)
	{
		$name = str_replace('_', '/', $name);
		$res = Request::postCurl(strtolower(getName(__CLASS__)).'/'.$name,$arguments[0]);
		return $res;
	}

	public function __call($name,$arguments)
	{
		$name = str_replace_limit('_', '/', $name,1);
		$res = Request::postCurl(strtolower(getName(__CLASS__)).'/'.$name,$arguments[0],2);
		return $res;
	}
}
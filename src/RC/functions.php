<?php
namespace RC;
use RC\User;
use RC\Message;

function getName($class)
{
	return array_pop(explode('\\',$class));
}

/** 
 * 对字符串执行指定次数替换 
 * @param  Mixed $search   查找目标值 
 * @param  Mixed $replace  替换值 
 * @param  Mixed $subject  执行替换的字符串／数组 
 * @param  Int   $limit    允许替换的次数，默认为-1，不限次数 
 * @return Mixed 
 */  
function str_replace_limit($search, $replace, $subject, $limit=-1){  
    if(is_array($search)){  
        foreach($search as $k=>$v){  
            $search[$k] = '`'. preg_quote($search[$k], '`'). '`';  
        }  
    }else{  
        $search = '`'. preg_quote($search, '`'). '`';  
    }  
    return preg_replace($search, $replace, $subject, $limit);  
}  
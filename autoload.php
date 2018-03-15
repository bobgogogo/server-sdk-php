<?php

function classLoader($class)
{
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $file = __DIR__ . '/src/' . $path . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
}
//此处设置你的appkey 在融云开发者后台，进入app详情后左侧菜单App Key中查看
define('APPKEY','kj7swf8ok1g92');
//此处设置你的appSecret 同上
define('APPSECRET','uDvzNWoJBc');
//融云API访问地址
define('RURL','http://api.cn.ronghub.com/');
//设置返回格式，此处选择json
// define('BACK','json');

spl_autoload_register('classLoader');
require_once  __DIR__ . '/src/RC/functions.php';

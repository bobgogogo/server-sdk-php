<?php
require_once '../autoload.php';

use RC\User;

use RC\Message;


/**
* 
*/

/**
* 注册用户，生成用户在融云的唯一身份标识 Token，各端 SDK 使用 Token 连接融云服务器
*/
// $params = ['userId'=>$_GET['id'],'name'=>'小A','portraitUri'=>'https://t10.baidu.com/it/u=1169422368,3313647490&fm=173&app=12&f=JPEG?w=550&h=238&s=1EB46C8154611503B639DD130300C0C0'];
// $res = User::getToken($params);
// var_dump($res);

/**
* 当您的用户昵称和头像变更时，您的 App Server 应该调用此接口刷新在融云侧保存的用户信息，以便融云发送推送消息的时候，能够正确显示用户信息。
*/
// $params = ['userId'=>'1','name'=>'小B','portraitUri'=>'https://t10.baidu.com/it/u=1169422368,3313647490&fm=173&app=12&f=JPEG?w=550&h=238&s=1EB46C8154611503B639DD130300C0C0'];
// $res = User::refresh($params);
// var_dump($res);

/**
* 获取用户在线状态
*/
// $params = ['userId'=>'1'];
// $res= User::checkOnline($params);
// var_dump($res);

/**
* 用户封禁
*/
// $params = ['userId'=>'1','minute'=>'1000'];
// $res = User::block($params);
// var_dump($res);

/**
* 用户解封
*/
// $params = ['userId'=>'1'];
// $res = User::unblock($params);
// var_dump($res);

/**
* 获取被封禁用户方法
*/
// $params = [];
// $res = User::block_query();
// var_dump($res);

/**
* 添加用户到黑名单
*/
// $params = ['userId'=>'21','blackUserId'=>'1'];
// $res = User::blacklist_add($params);
// var_dump($res);

/**
* 移除黑名单用户
*/
// $params = ['userId'=>'21','blackUserId'=>'2'];
// $res = User::blacklist_remove($params);
// var_dump($res);


/**
* 获取某用户黑名单列表
*/
// $params = ['userId'=>'21'];
// $res = User::blacklist_query($params);
// var_dump($res);

/*********************SDK全部以文本消息为测试方法，具体消息体以官网提供为主***************************/

/**
* 发送单聊消息方法  
*/
//content信息需要先转换为json格式，其他参数请参考官方文档
// $content = json_encode(['content'=>'Hello World','extra'=>'helloExtra']);
// $params = ['fromUserId'=>'1','toUserId'=>'2','objectName'=>'RC:TxtMsg','content'=>$content];
// $res = Message::private_publish($params);
// var_dump($res);

/**
* 发送单聊模板消息方法
*/
//content 信息需要先转换为json格式，其他参数请参考官方文档
$content = json_encode(['content'=>'Hello World','extra'=>'helloExtra']);
$params =	['fromUserId'=>'1',
			'toUserId'=>['2','3'],
			'objectName'=>'RC:TxtMsg',
			'values'=>[['{a}'=>'123','{c}'=>'789'],['{b}'=>'456']],
			'content'=>$content,
			'pushContent'=>['push{a}','push{b}']
			];
//所有提交方式为json的提交，都采用实例化类的方法完成
$message = new Message();
$res = $message->private_publish_template($params);
var_dump($res);
/**
* 
*/
/**
* 
*/
/**
* 
*/
/**
* 
*/
/**
* 
*/



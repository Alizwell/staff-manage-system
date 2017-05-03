<?php
	//设置操作文本格式
	header("Content-type:text/html;charset=utf-8");

	define('HOST','127.0.0.1');
	define('USERNAME', 'root');
	define('PASSWORD','thinker');
	
	//连接数据库
	if ( ! mysql_connect(HOST,USERNAME,PASSWORD)) {
		echo "连接库失败";
		echo  mysql_error();
	}
	
	//选择库
	if (!mysql_select_db('test')) {
		echo  "选择库失败";
		echo   mysql_error();
	}
	
	//设置字体
	mysql_query('set names utf8');
?>
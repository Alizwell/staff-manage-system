<?php
//设置页面的内容编码格式
//header("Content-Type:text/plain;charset=utf-8");
header("Content-Type: application/json;charset=utf-8"); 


	//包含配置文件
	require_once("mainConnect.php");
	if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
		del();
	}else{
		exit;
	}

	function  del(){
		$delnum = $_POST["number"];
		$sql = "delete  from  testajax  where  staffNumber=$delnum ";
		$query = mysql_query($sql);
		if (mysql_affected_rows() == 1) {
			echo   '{"success":true,"msg":"成功删除number:'.$delnum.'的员工"}';
		}
		else{
			echo  '{"success":false,"msg":"员工number:'.$delnum.'不存在"}';
		}
	}

?> 
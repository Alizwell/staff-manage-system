<?php
//设置页面的内容编码格式
//header("Content-Type:text/plain;charset=utf-8");
header("Content-Type: application/json;charset=utf-8"); 


	//包含配置文件
	require_once("mainConnect.php");
	if ($_SERVER["REQUEST_METHOD"] == "GET" ) {
		serach();
	}elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
		create();
	}


	function  serach(){
		if (!isset($_GET["number"]) ||  empty($_GET
			["number"]) ) {
			echo '{"success":false,"msg":"参数错误"}';
			return;
		}
		$number = intval($_GET['number']);
		
		$result = '{"success":false,"msg":"没有找到员工。"}';
		$serachSql = "select  *  from  testajax  where  staffNumber=$number";
		$query=mysql_query($serachSql);
		if($query&&mysql_num_rows($query)){
			$data = mysql_fetch_assoc($query);
			$result = '{"success":true,"msg":"找到员工：员工编号：' . $data["staffNumber"] . 
								'，员工姓名：' . $data["staffName"] . 
								'，员工性别：' . $data["staffSex"] . 
								'，员工职位：' . $data["staffJob"] . '"}';
		}
		echo "$result";
		
	}


	function  create(){
		if (!isset($_POST["name"]) || empty($_POST["name"]) ||
		    !isset($_POST["number"]) || empty($_POST["number"]) ||
		    !isset($_POST["sex"]) || empty($_POST["sex"]) ||
		    !isset($_POST["job"]) || empty($_POST["job"]) 
		 ) {
			//echo "参数错误，员工信息填写不全";
			echo  '{"success":false,"msg":"参数错误,员工信息填写不全"}';
			return;
		}else{
			$name = $_POST["name"];
			$number = $_POST["number"];
			$sex = $_POST["sex"];
			$job = $_POST["job"];
			mysql_query('set names utf8');
			$insertSql = "insert  into  testajax(staffName,staffNumber,staffSex,staffJob)  values ('$name',$number,'$sex','$job')";
			$query = mysql_query($insertSql);
			if ($query) {
				echo  '{"success":true,"msg":"员工：'.$_POST["name"].'信息保存成功"}';
			}
		}
		
	}

?> 
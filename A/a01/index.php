<?php
	session_start();//开启session 缓存
	header("Content-Type:text/html;charset=utf8");
	if(!empty($_COOKIE['name'] and !is_null($_COOKIE['name']))){
		$_SESSION['name'] = $_COOKIE['name'];
		header("location: http://".$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']).'/main.php');
	}else{
		header("location: http://".$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']).'/login.php');
	}
?>
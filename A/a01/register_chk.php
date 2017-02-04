<?php
	include_once 'conn/conn.php';
	require_once 'common_func.php';//调用发送邮件的文件
	require_once 'PHPMailer/class.phpmailer.php';
	require_once 'PHPMailer/class.smtp.php';
	
	$reback = '0';
	$url = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME'])."/activation.php";
	$url .="?name=".trim($_GET['name'])."&pwd=".md5(trim($_GET['pwd']));
	//发送激活邮件
	$subject="激活码的获取";
	$mailbody="注册成功.你的激活码是"."<a href=$url  target=_blank>".$url."</a><br />"."请点击该地址，激活您的用户！";
	

	$envelope="mrsoft8888@sohu.com";
	/*   网络版发送邮件方法  */
	sendMai($envelope, $subject, $mailBody);

	
	$sql = "insert into tb_member(name,password,question,answer,email,realname,birthday,telephone,qq) values('".trim($_GET['name'])."','".md5(trim($_GET['pwd']))."','".$_GET['question']."','".$_GET['answer']."','".$_GET['email']."','".$_GET['realname']."','".$_GET['birthday']."','".$_GET['telephone']."','".$_GET['qq']."')";
	$num = $conne->uidRst($sql);
	if($num == 1){
		$reback = '1';
	}
	echo $reback;
	?>
<?php
include_once 'conn/conn.php';
require_once 'common_func.php'; // 调用发送邮件的文件
require_once 'PHPMailer/class.phpmailer.php';
require_once 'PHPMailer/class.smtp.php';

$reback = '0';
$name = $_GET ['foundname'];
$question = $_GET ['question'];
$answer = $_GET ['answer'];
$sql = "select email from tb_member where name = '" . $name . "' and question = '" . $question . "' and answer = '" . $answer . "'";
$email = $conne->getFields ( $sql, 0 );
if ($email != '') {
	$rnd = rand ( 1000, time () );
	$sql = "update tb_member set password = '" . md5 ( $rnd ) . "' where name = '" . $name . "' and question = '" . $question . "' and answer = '" . $answer . "'";
	$tmpnum = $conne->uidRst ( $sql );
	if ($tmpnum >= 1) {
		// 发送密码邮件
		$subject = "找回密码";
		$mailbody = '密码找回成功。您帐号的新密码是' . $rnd;
		// $envelope["from"]="cym3100@163.com";
		$envelope = "mrsoft8888@sohu.com"; // 网络版定义登录使用的邮箱
		sendMai($envelope, $subject, $mailBody);;
		$reback = '1';
	} else {
		$reback = '2';
	}
} else {
	$reback = $sql;
}
echo $reback;
?>
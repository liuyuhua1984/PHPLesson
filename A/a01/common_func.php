<?php
function sendMai($fromMail,$subject,$mailBody){
	try{
	$mail = new PHPMailer ( true );
	$mail->IsSMTP ();
	$mail->CharSet = "UTF-8";
	$mail->SMTPAuth = true;
	$mail->Port = 25;
	$mail->Host = "smtp.163.com"; // 邮箱smtp地址,此处以163为例
	$mail->Username = "mrsoft8888"; // 你的邮箱账号
	$mail->Password = "mrsoft8888"; // 你的邮箱密码
	$mail->From = $fromMail; // 发送者地址
	$mail->FromName = "我";
	$mail->AddAddress ( "1760075731@qq.com" );
	$mail->Subject = $subject; // 主题
	$mail->Body = $mailBody; // 内容
	$mail->WordWrap = 80; // 设置每行字符串的长度
	// $mail->AddAttachment("f:/test.png"); //可以添加附件
	$mail->IsHTML ( true );
	$mail->Send ();
	}catch(Exception $e){
		echo '邮件发送失败:'.$e->getMessage();
	}
}
?>
<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
	<title>登录成功</title>
</head>
<body>
	<?php echo '欢迎光临'.$_SESSION['name'] ?>
</body>
</html>
<?php

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type"  content="text/html; charset=utf8" />
	<title>找回密码</title>
	<link rel="stylesheet" href="css/style.css"/>
	<script src="js/found.js"></script>
	<script type="text/javascript" src="js/xmlhttprequest.js"></script>
</head>
<body>
	<div id="fdbgdiv">
		<div id="top">&nbsp;>>密码找回</div>
		<div id="foundnamediv">
		找回账号:
		<input id = "foundname" type="text" style="width: 100px;height: 15px; border:1px  #000000  solid;"/>
		</div>
		<div id="foundnamediv">
			密保问题: 
			<input  id="fdquestion" type = "text" style = "width: 100px; height:15px; border: 1px #000000 solid;"/>
		</div>
		<div id="foundnamediv"> 密保答案:
			<input  id="fdanswer"  type="text" style=" width: 100px; height:15px; border: 1px #000000 solid;"/>
		</div>
		<div id="foundnamediv" align="center"><button id="step1"></button></div>
	</div>
</body>
</html>
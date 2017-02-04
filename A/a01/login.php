<?php

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
	<title>用户登录</title>
	<link rel="styleheet"  type="text/css" href="css/style.css"/>
	<script type="text/javascript" src="js/login.js"></script>
	<script type="text/javascript" src="js/xmlhttprequest.js"></script>
</head>
<body>
	<div id="container">
		<div id="bgdiv">
			<div id="txtdiv1">
				<input id="lgname"  name="lgname" type="text" />
			</div>
			<div id="txtdiv2">
				<input id="lgpwd"  name="lgpwd" type="password" />
			</div>
			<div id="txtdiv3">
				<input id="lgchk"  type="text" maxlength="4" style="width:35px;" />
				<img id="chkid" src=""/>
				<a id="changea">看不清</a>
			</div>
			<div id="btndiv">
				<button id="lgbtn">&nbsp;</button>
				<button id="rgbtn">&nbsp;</button>
				<button id="fdbtn">&nbsp;</button>
				<input id="chknm" name="chknm" type="hidden" value=""/>
			</div>
			<div id="regimg" style="visibility: hidden;">&nbsp;</div>
		</div>
	</div>
</body>
</html>
<?php
header("Content-Type:image/png");//设置页面编码
$num = $_GET['num'];//获取超级链接传递的随机数
$imagewidth = 60;//定义画布的宽
$imageheight=18;//定义画布的高
$numimage = imagecreate($imagewidth, $imageheight);//创建画布
$tmpColor=240;
imagecolorallocate($numimage, $tmpColor, $tmpColor, $tmpColor);//设置画面着色
for($i=0; $i<strlen($num); $i++){
	$x = mt_rand(1,8) + $imagewidth * $i/4;
	$y = mt_rand(1,$imageheight/4);
	//定义图像的着色
	$color = imagecolorallocate($numimage,mt_rand(0,150), mt_rand(0,150), mt_rand(0,150));
	imagestring($numimage, 5, $x, $y, $num[$i], $color);//将随机数写入画布
}
//生成干扰线
for($i=0; $i<200; $i++){
	//定义着色
	$randcolor = imagecolorallocate($numimage, rand(200,255), rand(200,255), rand(200,255));
	imagesetpixel($numimage, rand() %70, rand()%20, $randcolor);//生成干扰线
}
imagepng($numimage);//生成图像
imagedestroy($numimage)//释放资源
?>
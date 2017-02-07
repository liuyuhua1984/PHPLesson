<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2017/2/6
 * Time: 15:47
 */


function aunhtml($content){
    $content=htmlspecialchars($content);//转换文本中的特殊字符
    $content=str_replace(chr(13),"<br>",$content);//替换文本中的换行符
    $content=str_replace(chr(32),"&nbsp;",$content);//替换文本中的&nbsp;
    $content=str_replace("[_[","<",$content);			//替换文本中的大于号
    $content=str_replace(")_)",">",$content);			//替换文本中的小于号
    $content=str_replace("|_|"," ",$content);				//替换文本中的空格
    return trim($content);
}

/**定义一个用于截取一段字符串
 * @param $str
 * @param $start
 * @param $len
 */
function msubstr($str,$start,$len){
    $tmpstr="";
    $strlen=$start+$len;
    for($i=0;$i<$strlen;$i++){
        if(ord(substr($str,$i,1))>0xa0){
            $tmpstr .=substr($str,$i,2);
            $i++;
        }else{
            $tmpstr.=substr($str,$i,1);
        }
    }
    return $tmpstr;
}
?>
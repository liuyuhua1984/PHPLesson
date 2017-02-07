<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2017/2/6
 * Time: 11:01
 *
 */
    header("Content-Type: text/html;charset=utf8");
    require_once("system/system.inc.php");//调用指定文件
    $arraybbstell=$admindb->ExecSQL("select * from tb_mr_book",$conn);//执行select查询语句
    if (!$arraybbstell){
        $smarty->assign("isbbstell","F");//
    }else{
        $smarty->assign("isbbstell","T");
        $smarty->assign("arraybbstell",$arraybbstell);
    }
    if (isset($_GET['page'])){
        $page=$_GET['page'];
    }else{
        $page=1;
    }
    $arraybbs=$seppage->ShowPage("select * from tb_mr_book",$conn,1,$page);//调用分页类,实现分布功能
    if (!$arraybbs){
        $smarty->assign("isbbs","F");
    }else{
        $smarty->assign("isbbs","T");
        $smarty->assign("showpage",$seppage->ShowPage("","","",""));//定义输出分页数据的模板变量showpage
        $smarty->assign("arraybbs",$arraybbs);
    }
    $smarty->display("index.tpl");//显示指定模板
?>
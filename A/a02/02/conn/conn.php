<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2017/2/6
 * Time: 14:15
 */
/**数据库类型**/
$dbms = "mysql";
/**数据库名称**/
$dbName = 'db_pagination';
/**数据库用户名**/
$user = "root";
/**数据库密码**/
$pwd = "Admin!@#123456qhj";
/**主机名**/
$host = "127.0.0.1";
$dsn = "$dbms:host=$host;dbname=$dbName";//

try{
    $conn = new PDO($dsn,$user,$pwd);//实例化数据库
    $conn->query("set names utf8");
}catch(Exception $e){
    echo $e->getMessage()."<br />";
}
?>
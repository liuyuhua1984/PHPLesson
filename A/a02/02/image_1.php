<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2017/2/6
 * Time: 16:08
 */
include_once('conn/conn.php');
$query="select * from tb_mr_bccd where tb_bccd_id=".$_GET['recid'];
$result = $conn->query($query);
if ($result){
    $data=$result->fetch(PDO::FETCH_ASSOC);
    print_r($data);
    echo $data['tb_bccd_picture'];
}
?>
<?php
class opmysql{
	/**服务器地址**/
	private $host = "127.0.0.1";
	/**登录账号**/
	private $name = "root";
	/**密码**/
	private $pwd = "Admin!@#123456qhj";
	/**数据库名称**/
	private $dBase = "db_reglog";
	/**数据库链接资源**/
	private $conn = "";
	/**结果集**/
	private $result = "";
	/**返回结果**/
	private $msg = "";
	/**返回字段**/
	private $fields;
	/**返回字段数**/
	private $fieldsNum = 0;
	/**返回结果数**/
	private $rowNum = 0;
	/**返回单条记录的字段数组**/
	private $rowRst = "";
	/**返回字段数组**/
	private $filesArray = array();
	/**返回结果数组**/
	private $rowsArray = array();
	/**
	 * 初始化
	 * @param string $host
	 * @param string $name
	 * @param string $pwd
	 * @param string $dBase
	 */
	function __construct($host="",$name="",$pwd="",$dBase=""){
		if ($host !="'"){
			$this->host = $host;
		}
		if ($name !=""){
			$this->name = $name;
		}
		if ($pwd != ""){
			$this->pwd = $pwd;
		}
		if ($dBase != ""){
			$this->dBase = $dBase;
		}
		//初始化链接 
		init_conn();
	}
	
	/***
	 * 初始化数据库
	 */
	function init_conn(){
		$this->conn=@mysql_connect($this->host,$this->name,$this->pwd);
		@mysql_select_db($this->dBase,$this->conn);
		mysql_query("set names utf8");
	}
	
	/**
	 * 查询结果
	 * @param unknown $sql
	 */
	function mysql_query_rst($sql){
		if ($this->conn == ""){
			$this->init_conn();
		}
		$this->result = @mysql_query($sql,$this->conn);
	}
	
	/**
	 * 取得字段数
	 * @param unknown $sql
	 */
	function getFieldsNum($sql){
		$this->mysql_query_rst($sql);
		$this->fieldsNum = @mysql_num_fields($this->result);
	}
	
	/**
	 * 取得查询结果数
	 * @param unknown $sql
	 */
	function getRowsNum($sql){
		$this->mysql_query_rst($sql);
		if (mysql_errno() == 0){
			return @mysql_num_fields($this->result);
		}else{
			return "";
		}
	}
	
	/**
	 * 取得记录数组(单条记录)
	 * @param unknown $sql
	 */
	function getRowRst($sql){
		$this->mysql_query_rst($sql);
		if (mysql_error() == 0){
			$this->rowRst = mysql_fetch_array($this->result,MYSQL_ASSOC);
			return $this->rowsRst;
		}else{
			return "";
		}
	}
	
	/**
	 * 取得记录数组(多条记录)
	 * @param unknown $sql
	 */
	function getRowsArray($sql){
		$this->mysql_query_rst($sql);
		if (mysql_errno() == 0){
			while ($row = mysql_fetch_array($this->result,MYSQL_ASSOC)){
				$this->rowsArray[] = $row;
			}
			return $this->rowsArray;
		}else{
			return "";
		}
	}
	
	/**
	 * 更新,删除,添加记录数
	 * @param unknown $sql
	 */
	function uidRst($sql){
		if ($this->conn == ""){
			$this->init_conn();
		}
		@mysql_query($sql);
		$this->rowNum = @mysql_affected_rows();
		if (mysql_errno() == 0){
			return $this->rowNum;
		}else{
			return "";
		}
	}
	
	/**
	 * 获对应的字段值
	 * @param unknown $sql
	 * @param unknown $fields
	 */
	function getFields($sql,$fields){
		$this->mysql_query_rst($sql);
		if (mysql_errno() == 0){
			if (mysql_num_rows($this->result) > 0){
				$tmpfld = @mysql_fetch_row($this->result);
				$this->fields = $tmpfld[$fields];
			}
			return $this->fields;
		}else{
			return "";
		}
	}
	
	/**
	 * 错误信息
	 */
	function msg_error(){
		if (mysql_errno( ) != 0){
			$this->msg = mysql_error();
		}
		return $this->msg;
	}
	
	/**
	 * 释放结果集
	 */
	function close_rst(){
		mysql_free_result($this->result);
		$this->msg = "";
		$this->fieldsNum = 0;
		$this->rowNum = 0;
		$this->filesArray = "";
		$this->rowsArray = "";
	}
	
	function  close_conn(){
		$this->close_rst();
		mysql_close($this->conn);
		$this->conn ="";
	}
	
}

$conne = new opmysql();
?>
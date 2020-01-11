<?php 
include_once("../include/class.mysqldb.php");
include_once("../include/config.inc.php");
session_start();
if($_SESSION['APIUser']!='' AND $_SESSION_['EmpUser']==''){
	unset($_SESSION['id']);
	print "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=../admin/index.php'>"; 
}else{
	unset($_SESSION['id']);
	print "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=../index.php'>"; 
}
?>

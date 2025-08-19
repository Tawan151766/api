<?php 
include_once("../include/class.mysqldb.php");
include_once("../include/config.inc.php");
session_start();
if(!empty($_SESSION['APIUser'] AND $_SESSION['security'])){
	unset($_SESSION['id']);
	print "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=../admin/login.php'>"; 
}else{
	unset($_SESSION['id']);
	print "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=../admin/login.php'>"; 
}
?>

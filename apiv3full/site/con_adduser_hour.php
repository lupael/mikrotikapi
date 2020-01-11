<?php
	include_once("../include/class.mysqldb.php");
	include_once("../include/config.inc.php");
	include_once('../config/routeros_api.class.php');			
	include_once('../phpqrcode/qrlib.php');
	include_once('conn.php');
	echo "<meta charset='utf-8'>" ;
	$username=$_REQUEST['username'];
	$password=$_REQUEST['password'];
	$profiles=$_REQUEST['profile'];	
	$id=$_SESSION['id'];
	$date=date('Y-m-d H:i:s');
	if($username != ""){
		$ARRAY = $API->comm("/ip/hotspot/user/add", array(
									  "name"     => $username,
									  "password" => $password,	
									  "profile"  => $profiles,	
							));
		$file=$username.".png";
		QRcode::png('http://'.$ip.'/login?username='.$username.'&password='.$password.'', '../qrcode/'.$file.'');
		mysql_query("INSERT INTO mt_gen VALUE('".$username."','".$password."','".$profiles."','".$file."','".$date."','".$id."')");
		echo "<script>alert('ระบบได้ทำการเพิ่มผู้ใช้งาน Hotspot เรียบร้อยแล้ว.')</script>";
		echo "<meta http-equiv='refresh' content='0;url=index.php?opt=user_list' />";
		exit();
	}
?>
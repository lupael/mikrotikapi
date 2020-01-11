<?php
	include_once("../include/class.mysqldb.php");
	include_once("../include/config.inc.php");
	include_once('../config/routeros_api.class.php');			
	include_once('../phpqrcode/qrlib.php');
	include_once('conn.php');
	echo "<meta charset='utf-8'>" ;
	$username=$_REQUEST['username'];
	$password=$_REQUEST['password'];
	$service="pppoe";
	$profiles=$_REQUEST['profile'];	
	$id=$_SESSION['id'];
	$date=date('Y-m-d H:i:s');
	if($username != ""){
		$ARRAY = $API->comm("/ppp/secret/add", array(
									  "name"     => $username,
									  "password" => $password,
									  "service"	=> $service,
									  "profile"  => $profiles ,	
							));
		$file=$username.".png";
		QRcode::png('http://'.$ip.'/login?username='.$username.'&password='.$password.'', '../qrcode/'.$file.'');
		mysql_query("INSERT INTO mt_gen_pppoe VALUE('".$username."','".$password."','".$profiles."','".$file."','".$date."','".$id."')");
		echo "<script>alert('ระบบได้ทำการเพิ่มผู้ใช้งาน PPPoE เรียบร้อยแล้ว.')</script>";
		echo "<meta http-equiv='refresh' content='0;url=index.php?opt=pppoe_list' />";
		exit();
	}
?>
<?php
	include_once("../include/class.mysqldb.php");
	include_once("../include/config.inc.php");	
	include_once('../config/routeros_api.class.php');			
	include_once('conn.php');
	
	echo "<meta charset='utf-8'>" ;	
	$name=$_REQUEST['name'];
	$session=$_REQUEST['session'];
	$idle=$_REQUEST['idle'];	
	$use=$_REQUEST['use'];	
	$limit=$_REQUEST['limit'];	
	$keep=$_REQUEST['keep'];
	$auto=$_REQUEST['auto'];
	$list=$_REQUEST['address'];
	$uptime=$_REQUEST['uptime'];
	


	
	
	if($name != ""){
		$sql="SELECT pro_name FROM mt_profile WHERE pro_name='".$name."'";
		$query=mysql_query($sql);
		$rows=mysql_num_rows($query);
		
		if($rows>0){
			echo "<script>alert('ชื่อแพคเกจนี้มีอยู่ในระบบแล้ว กรุณาตั้งชื่อแพคเกจใหม่.')</script>";
			echo "<script>window.history.back()</script>";
		}else{
			mysql_query("INSERT INTO mt_profile VALUE('".$name."','".$session."','".$idle."','".$keep."','".$auto."','".$uptime."','".$use."','".$limit."','".$list."',NOW())");
			$ARRAY = $API->comm("/ip/hotspot/user/profile/add", array(
									"name" => $name,
								//	"session-timeout" => $session,
									"idle-timeout" => $idle,
									"keepalive-timeout" => $keep,
									"status-autorefresh" => $auto,
									"shared-users" => $use,
									"rate-limit" => $limit,
								//	"address-list" => $list,
									"on-login" => $login
								));		
			echo "<script>alert('ทำการเพิ่มแพคเกจเข้าระบบเรียบร้อยแล้ว.')</script>";
			echo "<meta http-equiv='refresh' content='0;url=index.php?opt=profile' />";
			exit;
		}
	}
?>
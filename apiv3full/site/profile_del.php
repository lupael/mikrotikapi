<?php
	include_once("../include/class.mysqldb.php");
	include_once("../include/config.inc.php");
	include_once('../config/routeros_api.class.php');			
	include_once('conn.php');
	echo "<meta charset='utf-8'>" ;	
	
	$profile = $_GET['name'];
		
	if($num=='0'){
		echo "<script>alert('Default profile can not be removed.')</script>";
		echo "<meta http-equiv='refresh' content='0;url=index.php?opt=profile' />";
		exit;
	}else{		
		$ARRAY = $API->comm("/ip/hotspot/user/profile/remove", array(
								"numbers" => $profile,
							));	
		mysql_query("DELETE FROM mt_profile WHERE pro_name = '".$profile."' ");
		echo "<script>alert('ทำการลบแพคเกจที่เลือกเรียบร้อยแล้ว.')</script>";
		echo "<meta http-equiv='refresh' content='0;url=index.php?opt=profile' />";
		exit;
	}
?>
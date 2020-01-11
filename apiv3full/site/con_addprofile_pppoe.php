<?php
	include_once("../include/class.mysqldb.php");
	include_once("../include/config.inc.php");	
	include_once('../config/routeros_api.class.php');			
	include_once('conn.php');
	
	echo "<meta charset='utf-8'>" ;	
	$name=$_REQUEST['name'];
	$local=$_REQUEST['local'];
	$remote=$_REQUEST['remote'];
	$limit=$_REQUEST['limit'];

	
	
	if($name != ""){
		$sql="SELECT pro_name FROM mt_profile_pppoe WHERE pro_name='".$name."'";
		$query=mysql_query($sql);
		$rows=mysql_num_rows($query);
		
		if($rows>0){
			echo "<script>alert('ชื่อแพคเกจนี้มีอยู่ในระบบแล้ว กรุณาตั้งชื่อแพคเกจใหม่.')</script>";
			echo "<script>window.history.back()</script>";
		}else{
			mysql_query("INSERT INTO mt_profile_pppoe VALUE('".$name."','".$local."','".$remote."','".$limit."',NOW())");
			$ARRAY = $API->comm("/ppp/profile/add", array(
									"name" => $name,
									"local-address" => $local,
									"remote-address" => $remote,
									"rate-limit" => $limit,
								));		
			echo "<script>alert('ทำการเพิ่มแพคเกจเข้าระบบเรียบร้อยแล้ว.')</script>";
			echo "<meta http-equiv='refresh' content='0;url=index.php?opt=profile_pppoe' />";
			exit;
		}
	}
?>
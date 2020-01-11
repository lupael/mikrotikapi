<?php
	include_once("../include/class.mysqldb.php");
	include_once("../include/config.inc.php");	
	include_once('../config/routeros_api.class.php');			
	include_once('conn.php');
	
	echo "<meta charset='utf-8'>" ;	
	$profile=$_REQUEST['profile'];
	$name=$_REQUEST['name'];
	$local=$_REQUEST['local'];
	$remote=$_REQUEST['remote'];
	$limit=$_REQUEST['limit'];	
		
	if($name != ""){
			mysql_query("UPDATE mt_profile_pppoe SET name='".$name."','".$local."','".$remote."','".$limit."'");
			$ARRAY = $API->comm("/ppp/profile/set", array(
									"name" => $name,
									"local-address" => $local,
									"remote-address" => $remote,
									"rate-limit" => $limit,
									"numbers" => $profile,
								));		
			echo "<script>alert('Save Done')</script>";
			echo "<meta http-equiv='refresh' content='0;url=index.php?opt=profile_pppoe' />";
			exit;
		}
?>
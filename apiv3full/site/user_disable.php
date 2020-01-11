<?php
	include_once("../include/class.mysqldb.php");
	include_once("../include/config.inc.php");
	include_once('../config/routeros_api.class.php');			
	include_once('conn.php');
	echo "<meta charset='utf-8'>" ;
	$username=$_GET['user'];	
	$ARRAY = $API->comm("/ip/hotspot/user/disable
						=.id=".$_GET['user']."");	
	$ARRAY = $API->comm("/ppp/secret/disable
						=.id=".$_GET['user']."");		
	$ARRAY = $API->comm("/tool/user-manager/user/disable
						=.id=".$_GET['user']."");	
	echo "<script>alert('Disabled User Successful.')</script>";
	echo "<meta http-equiv='refresh' content='0;url=index.php?opt=useronline' />";
	exit;

?>
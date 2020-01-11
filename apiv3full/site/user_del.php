<?php
	include_once('../config/routeros_api.class.php');			
	include_once('conn.php');
	echo "<meta charset='utf-8'>" ;
	$username=$_GET['user'];
	$ARRAY = $API->comm("/ip/hotspot/user/remove
						=.id=".$_GET['user']."");	
	$ARRAY = $API->comm("/ppp/secret/remove
						=.id=".$_GET['user']."");		
		$ARRAY = $API->comm("/tool/user-manager/user/remove
						=.id=".$_GET['user']."");	
	echo "<script>alert('Delete Successful.')</script>";
	echo "<meta http-equiv='refresh' content='0;url=index.php?opt=user' />";
	exit;

?>
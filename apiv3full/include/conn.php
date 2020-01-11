<?php	
	session_start();		
	$API = new routeros_api();				
	//$API->debug = false;	
	//set_time_limit(160);
	
	$id=$_SESSION['id'];	
	$sql=mysql_query("SELECT * FROM mt_config WHERE mt_id='".$id."'");
	$result=mysql_fetch_array($sql);	
		$ip=$result['mt_ip'];
		$user=$result['mt_user'];
		$pass=$result['mt_pass'];
		
		if($API->connect($ip, $user, $pass)) {	
				
		}else{	
			echo "<script language='javascript'>alert('Disconnect')</script>";	
			echo "<meta http-equiv='refresh' content='0;url=../index.php' />";
			exit(0);			
		}		
		
?>
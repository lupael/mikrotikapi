<?php
	include_once('../config/routeros_api.class.php');
	include_once("../include/class.mysqldb.php");
	include_once("../include/config.inc.php");
	include_once('../phpqrcode/qrlib.php');
	include_once('random.php');			
	include_once('conn.php');
	
	set_time_limit(500);	
	$num=$_REQUEST['total'];
		
		$user = $_REQUEST['username'];
		$pass = $_REQUEST['password'];
		$service="pppoe";
		$profile=$_REQUEST['profile'];
		$id=$_SESSION['id'];
		$date=date('Y-m-d H:i:s');
		$i=1;
		do{
			$profiles=$_REQUEST['profile'];
			$username=$_REQUEST['prefix'].genUser();		
			$password=genPass();
			$sql=mysql_query("SELECT * FROM mt_gen_pppoe WHERE user='".$username."'");
			$row=mysql_num_rows($sql);
				
			if($row<=0){
				$file=$username.".png";
				QRcode::png('http://'.$ip.'/login?username='.$username.'&password='.$password.'', '../qrcode/'.$file.'');
				$add=mysql_query("INSERT INTO mt_gen_pppoe VALUE('".$username."','".$password."','".$profile."','".$file."','".$date."','".$id."')");	
				$ARRAY = $API->comm("/ppp/secret/add", array(
									"name"		=> $username,
									"service"	=> $service,
									"password"	=> $password,
									"profile"	=> $profiles,
									));								
				$i++;			
			}
		}while($i<=$num);
				
		echo "<script>alert('Add PPPoE user complete.')</script>";
		echo "<meta http-equiv='refresh' content='0;url=index.php?opt=pppoe_list' />";
		exit();
?>

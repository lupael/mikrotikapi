<?php
	include_once("../include/class.mysqldb.php");
	include_once("../include/config.inc.php");	
	include_once('../phpqrcode/qrlib.php');
	
     for($i=1;$i<=5;$i++){
		$user=admin;
		$pass=1234;	
		QRcode::png('http://192.168.99.1/login?username='.$user.'&password='.$pass.'');
		QRcode::png('http://192.168.99.1/login?username='.$user.'&password='.$pass.'');
		QRcode::png('http://192.168.99.1/login?username='.$user.'&password='.$pass.'');

	 }
    
	
	
			
		
?>
<?php
	session_start();
	if(!empty($_GET['id'])){
		$_SESSION['id']=$_GET['id'];	
	}
	
	
	
		
		if($_GET['conn']=="connect") {	
			echo "<meta http-equiv='refresh' content='0;url=index.php' />";	
		}else{	
			echo "<script language='javascript'>alert('Disconnect')</script>";	
			echo "<script language='javascript'>window.location='../index.php'</script>";
			exit();
		}
?>
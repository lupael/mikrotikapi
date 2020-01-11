<?php
	
	include_once("../include/class.mysqldb.php");
	include_once("../include/config.inc.php");	
	
    echo"<body onload=\"window.print();\"> ";
    
	
	
	$sql = mysql_query("SELECT * FROM mt_gen WHERE date='".$_GET['id']."'");
		
		echo"<table border=\"1\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
		$intRows = 0;
		while($result = mysql_fetch_array($sql))
		{
			$intRows++;
			echo "<td width=50px>";
			echo "<img src='../qrcode/".$result['qrcode']."' />";
			echo "</td>";
			echo "<td width=150px>"; 
			
				echo "<center><img src='../img/p2.png' width=100px /></center><hr>";
				echo "<lift>User : ".$result["user"]."</center>\n";
				echo "<lift>Pass : ".$result["pass"]."</center>";                				
			
	
			echo"</td>";
			if(($intRows)%3==0)
			{
				echo"</tr>";
			}

			if(($intRows)%21==0){
				echo"</tr></table><table border=\"1\"  cellspacing=\"1\" cellpadding=\"1\" style=\"page-break-before: always\">";
			}
		}
		echo"</tr></table>";
?>		

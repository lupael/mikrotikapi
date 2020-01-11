<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('conn.php');	
																																															
			$ARRAY = $API->comm("/ip/hotspot/user/print");	
		
		
		if($_REQUEST['check']!=""){			
				for($i=0;$i < count($_REQUEST['check']);$i++){
					
					$user=$_REQUEST['check'][$i];
					
					mysql_query("DELETE FROM mt_gen WHERE user =  '".$user."'");
					$ARRAY = $API->comm("/ip/hotspot/user/remove", array(
											"numbers" => $user,
										));	
							
					$img = $user.".png";
					unlink("../qrcode/".$img);					
				}
				echo "<script>alert('Delete Successful.')</script>";
				echo "<meta http-equiv='refresh' content='0;url=index.php?opt=user_list' />";
				exit();
						
		}
		
									   								
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script type="text/javascript">
	$(document).ready(function() {
    $('#selecctall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});
	</script>    
</head>
<body>
 <section class="content">
		<form name="user" action="" method="post">
        <div id="page-wrapper">
            <div class="row">
                <div class= "col-md-6 col-md-offset-3">
                    <div class="box box-solid box-primary">
                       <div class="box-header">
                           <h3 class="box-title"><i class="fa fa-users"></i> Hotspot User </h3>                           
                        </div>
                        <!-- /.panel-heading -->
                         <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>   
											 
                                        	<th>No.</th> 
											 <th>name</th> 
											<th>profile</th> 											 
                                            <th>Edit</th>                                                                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            <?php
													$date=$_GET['id'];
													
													$query=mysql_query("SELECT * FROM mt_gen WHERE date='".$date."'");									
													/*
													$num =count($ARRAY);													
													for($i=0; $i<$num; $i++){	
													$no=$i+1;
													echo "<tr>";
														echo "<td>".$no."</td>";								
														echo "<td>".$ARRAY[$i]['name']."</td>";
														echo "<td>".$ARRAY[$i]['password']."</td>";
														echo "<td>".$ARRAY[$i]['profile']."</td>";
														echo "<td>".$ARRAY[$i]['uptime']."</td>";
														echo "<td><a href='user_del.php?user=".$ARRAY[$i]['name']."'>Delete</a></td>";
													echo "</tr>";
													}
													*/
													$i=0;
													while($result=mysql_fetch_array($query)){
														$i++;
														echo "<tr>";
															echo "<td><center><input class=\"checkbox1\" type=\"checkbox\" name=\"check[]\" id=\"check[]\" value=".$result['user']."></center></td>";		
															echo "<td>".$i."</td>";								
															echo "<td>".$result['user']."</td>";															
															echo "<td>".$result['profile']."</td>";	
															echo "<td><a href='index.php?opt=edit_user&id=".$result['user']."'>Edit</a></td>";														
														echo "</tr>";
													
													}
												?>
                                                                                                   
                                                                                
                                    </tbody>                                    
                                </table>
                            </div>
                           
        </div>
        <!-- /#page-wrapper -->
								<div class="form-group input-group">                                        
                                       &nbsp;&nbsp;&nbsp;<button id="btnSave" class="btn btn-danger" type="submit"><i class="fa fa-times"></i>&nbsp;Delete&nbsp;</button>
                                    </div>
    </div>
    </div></div></div></form>
</body>
</html>

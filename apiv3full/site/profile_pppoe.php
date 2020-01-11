<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('conn.php');	
																																
			$ARRAY = $API->comm("/ppp/profile/print");			
									   								
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

        <div id="page-wrapper">
           <br />
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div><h5><panel class="panel bg-blue"><i class="fa fa-wifi"></i> จัดการแพคเกจการใช้งาน PPPoE</panel></h5></div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>     
                                        	<th>ที่.</th>                                                                         	
                                            <th>ชื่อแพคเกจ</th>
                                            <th>ไอพีเซิฟเวอร์</th>
                                            <th>กรุ๊ปไอพี</th>
                                            <th>ความเร็วที่ให้บริการ</th>
                                            <th> ลบ </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            
												<?php
													$num =count($ARRAY);													
													for($i=0; $i<$num; $i++){	
													$no=$i+1;
													echo "<tr>";
														echo "<td>".$no."</td>";																																							
														echo "<td>".$ARRAY[$i]['name']."</td>";
                                                        echo "<td>".$ARRAY[$i]['local-address']."</td>";
                                                        echo "<td>".$ARRAY[$i]['remote-address']."</td>";
														echo "<td>";
															if($ARRAY[$i]['rate-limit']==""){
																echo "Unlimited";
															}else{
																echo $ARRAY[$i]['rate-limit'];
															}																
														echo "</td>";
													//	echo "<td>".$ARRAY[$i]['session-timeout']."</td>";
													//	echo "<td>".$ARRAY[$i]['idle-timeout']."</td>";
													//	echo "<td>".$ARRAY[$i]['shared-users']."</td>";
														echo "<td>
                                                        
                                                            <a href='profile_pppoe_del.php?name=".$ARRAY[$i]['name']."'><button type=\"button\" class=\"btn btn-danger\"><i class=\"fa fa-trash-o\"></i></button></a></td>";
														//    <a href='index.php?opt=edit_profile_pppoe&name=".$ARRAY[$i]['name']."'><button type=\"button\" class=\"btn btn-warning\"><i class=\"fa fa-pencil-square-o\"></i></button></a>
													echo "</tr>";
													}
												?>
                                                                                                   
                                                                               
                                    </tbody>
                                </table>
                            </div>
                           
        </div>
        <!-- /#page-wrapper -->

    </div>
    
</body>
</html>

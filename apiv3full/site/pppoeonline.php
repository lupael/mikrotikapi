<?php
				
			include_once('../config/routeros_api.class.php');			
			include_once('conn.php');	
																																															
			$ARRAY = $API->comm("/ppp/active/print");						
									   								
?>

<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 60; URL=$url1");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

        <section class="content">
           <div class="row">
                <div class="col-md-12">
                        <div class="col-md-3"></div>
		                <div class="col-md-8">
                    <div class="box box-solid box-primary">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-bolt" aria-hidden="true"></i> PPPOE Online</h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>     
                                        	<th>No.</th>
                                            <th>ชื่อผู้ใช้งาน</th>
                                            <th>รูปแบบการให้บริการ</th>
                                            <th>เลขหมายไอพีที่ใช้งาน</th>
                                            <th>เลขหมายเครื่องที่ใช้งาน</th>
                                            <th>เวลาที่ใช้งาน</th>
                                            <th>เชิญออก</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            
												<?php
													$num =count($ARRAY);													
													for($i=0; $i<$num; $i++){
													$no=$i+1;
                                                    $bytes =  $ARRAY[$i]['bytes-out']/1048576;
													echo "<tr>";
														echo "<td>".$no."</td>";
														echo "<td>".$ARRAY[$i]['name']."</td>";
                                                        echo "<td>".$ARRAY[$i]['service']."</td>";
														echo "<td>".$ARRAY[$i]['address']."</td>";
														echo "<td>".$ARRAY[$i]['caller-id']."</td>";
														echo "<td>".$ARRAY[$i]['uptime']."</td>";
														echo "<td><a href='pppoeonline_del.php?user=".$i."'><button type=\"button\" class=\"btn btn-danger\"><i class=\"fa fa-power-off\"></i></button></a>";

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

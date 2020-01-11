<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('conn.php');	
																																															
			$ARRAY = $API->comm("/ppp/profile/print");
            $ARRAY = $API->comm("/ip/pool/print");
									   								
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
 <!-- Page Content -->
        <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12"><br/>
                        <div class="col-lg-2"></div>
		                <div class="col-lg-8">
		                    <div class="panel panel-info">                              
		                        <div class="panel-heading">
		                            <div><h4><panel class="panel bg-blue"><i class="fa fa-wifi"></i> สร้างแพคเกจให้บริการ PPPoE</panel></h4></div>
		                        </div>
		                        <div class="panel-body">
		                           <form id="add_user" action="con_addprofile_pppoe.php" method="post">
								   
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Profile Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="name" placeholder="กำหนดชื่อแพคเกจ" class="form-control" required>
                                        </div>

                                       <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Local Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="local" placeholder="กรุณากรอกไอพีเครื่องเซิฟเวอร์ (ตัวอย่างเช่น 10.0.0.1)" class="form-control" required>
                                        </div>                
                                      
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Pool Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <select class="form-control" name="remote" size="1" id="remote">
                                            	<?php
													$List = $API->comm("/ip/pool/print");
													$num =count($List);		
														echo '<option value="">กรุณาเลือกช่วงไอพีที่ต้องการ</option>';
													for($i=0; $i<$num; $i++){														
														echo '<option value="'.$List[$i]['name'].'">'.$List[$i]['name'].'</option>';
													}
												?>
                                            </select>
                                        </div>   

                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Rate Limit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="limit" placeholder="ความเร็วที่ให้บริการ Upload/Download (ตัวอย่าง : 1m/5m)" class="form-control" required>
                                        </div>
                                                                   
									<div class="form-group input-group">                                        
                                        <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-check"></i>&nbsp;Save&nbsp;</button>&nbsp;&nbsp;&nbsp;
                                        <button id="btnSave" class="btn btn-danger" type="reset"><i class="fa fa-times"></i>&nbsp;Reset&nbsp;</button></a>
                                    </div>
										
                                    </form>
		                        </div>		                        
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /#page-wrapper -->
        
            </div>
            <!-- /#wrapper -->
</body>
</html>

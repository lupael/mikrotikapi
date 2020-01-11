<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('conn.php');	
																																															
			$ARRAY = $API->comm("/ip/hotspot/user/profile/print");			
									   								
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
 <!-- Page Content -->
         <section class="content">

            <div class="row">
              <div class= "col-md-6 col-md-offset-3">
		                    <div class="panel panel-info">                              
		                        <div class="panel-heading">
		                            <div><h4><panel class="panel bg-blue"><i class="fa fa-wifi"></i> สร้างแพคเกจให้บริการ Hotspot 
		                            แบบรายวัน และรายชั่วโมง </h4>
		                            </div>
		                        </div>
		                        <div class="panel-body">
		                           <form id="add_user" action="con_addprofile.php" method="post">
								   
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Profile Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="name" placeholder="กำหนดชื่อแพคเกจ" class="form-control" required>
                                        </div>
										<hr>

                                <!--        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Session Timeout&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="session" placeholder="เวลาในการออนไลน์กับระบบ (ชั่วโมง:นาที:วินาที)" value="" class="form-control" required>
                                        </div>  -->

                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Idle Timeout&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></tr></span>
                                            <input type="text" name="idle" placeholder="วลาในการเชื่อมต่อระบบ (ชั่วโมง:นาที:วินาที)" class="form-control" value="none" required>
                                        </div>

										<div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Keepalive Timeout</strong></span>
                                            <input type="text" name="keep" placeholder="เวลาในการคงอยู่ในระบบ (ชั่วโมง:นาที:วินาที)" class="form-control" value="01:00:00" required>
                                        </div>

										<div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Status Autorefresh</strong></span>
                                            <input type="text" name="auto" placeholder="เวลาการอัพเดตสถานะ (ชั่วโมง:นาที:วินาที)" class="form-control" value="00:01:00" required>
                                        </div>										
										<hr>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Uptime&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="uptime" placeholder="ระยะเวลาการให้บริการ (ตัวอย่าง : 1d [หนึ่งวัน] หรือ 1h [หนึ่งชั่วโมง])" class="form-control" required>
                                        </div>

                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Shared Users&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></tr></span>
                                            <input type="text" name="use" placeholder="จำนวนผู้ใช้ต่อบัตร" class="form-control" value="1" required>
                                        </div>

                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Rate Limit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="limit" placeholder="ความเร็วที่ให้บริการ Upload/Download (ตัวอย่าง : 1m/5m)" class="form-control">
                                        </div>										
                                                                      
                                      
                          <!--            <div class="form-group input-group">
                                            <span class="input-group-addon">Address List&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <select class="form-control" name="address" size="1" id="address">
                                            	<?php
													$List = $API->comm("/ip/firewall/address-list/print");
													$num =count($List);		
														echo '<option value=""></option>';
													for($i=0; $i<$num; $i++){														
														echo '<option value="'.$List[$i]['list'].'">'.$List[$i]['list'].'</option>';
													}
												?>
                                            </select>
                                        </div>                  -->

									<div class="form-group input-group">                                        
                                        <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-save"></i>&nbsp;บันทึก&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="btnSave" class="btn btn-danger" type="reset"><i class="fa fa-undo"></i>&nbsp;เริ่มใหม่&nbsp;</button></a>
                                    </div>
										
                                    </form>
		                        </div>		                        
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /#page-wrapper -->
        
            
            <!-- /#wrapper -->
</body>
</html>

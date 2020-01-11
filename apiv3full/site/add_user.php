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
		<section class="content">		
 <!-- Page Content -->
        <div id="wrapper">

            <div class="row">
                <div class="col-md-offset-3 col-md-6">
		                    <div class="box box-solid box-primary">                            
		                       <div class="box-header">
                                   <h3 class="box-title"><i class="fa fa-wifi"></i> สร้างผู้ใช้งานสำหรับ Hotspot</h3>
		                        </div>
								
		                        <div class="box-body">
		                           <form id="add_user" action="con_adduser.php" method="post">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>ชื่อผู้ใช้&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="username" placeholder="กรุณากรอกชื่อผู้ใช้งาน" class="form-control" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>รหัสผ่าน&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="password" name="password" placeholder="กรุณากรอกรหัสผ่าน" class="form-control" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>แพคเกจ&nbsp;&nbsp;&nbsp;</strong></span>
                                            <select class="form-control" name="profile" size="1" id="profile">
                                            	<?php
													$num =count($ARRAY);
													for($i=0; $i<$num; $i++){
														$seleceted = ($i == 0) ? 'selected="selected"' : '';
														echo '<option value="'.$ARRAY[$i]['name'].$selected.'">'.$ARRAY[$i]['name'].'</option>';
													}
												?>
                                            </select>
                                        </div>                                        
                                      
                                     <div class="form-group input-group">                                        
                                        <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-save"></i>&nbsp;บันทึก&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="btnSave" class="btn btn-danger" type="reset"><i class="fa fa-undo"></i>&nbsp;เริ่มหม่&nbsp;</button>
                                    </div> 
                                    </form>
												
												</div>		                        
										</div>
                    
									</div>
					
								</div>
                
        
							</div>
					</div>
					
			</section>
            <!-- /#wrapper -->
</body>
</html>

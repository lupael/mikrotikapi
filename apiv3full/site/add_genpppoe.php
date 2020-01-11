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
 <!-- Page Content -->
        <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12"><br/>
                        <div class="col-lg-2"></div>
		                <div class="col-lg-8">
		                    <div class="panel panel-info">                              
		                        <div class="panel-heading">
		                            <div><h4><panel class="panel bg-blue"><i class="fa fa-wifi"></i> สร้างผู้ใช้งานสำหรับ PPPoE</panel></h4></div>
		                        </div>
		                        <div class="panel-body">
		                           <form id="add_pppoe" action="con_genpppoe.php" method="post">
                                  		<div class="form-group input-group">
                                            <span class="input-group-addon"><strong>คำนำหน้าผู้ใช้ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input name="prefix" type="text" class="form-control" maxlength="10" placeholder="กรุณากรอกคำนำหน้าชื่อผู้ใช้ (สูงสุด 10 ตัว)">
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>จำนวนบัตร &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="total" placeholder="กรุณากรอกจำนวนบัตรที่ต้องการจะสร้าง" class="form-control" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>จำนวนชื่อผู้ใช้&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <select class="form-control" name="username" size="1" id="username">
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                              <option value="5" selected="selected">5</option>
                                              <option value="6">6</option>
                                              <option value="7">7</option>
                                              <option value="8">8</option>
                                              <option value="9">9</option>
                                              <option value="10">10</option>
                                            </select>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>จำนวนรหัสผ่าน&nbsp;&nbsp;&nbsp;</strong></span>
                                            <select class="form-control" name="password" size="1" id="password">
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                              <option value="5" selected="selected">5</option>
                                              <option value="6">6</option>
                                              <option value="7">7</option>
                                              <option value="8">8</option>
                                              <option value="9">9</option>
                                              <option value="10">10</option>
                                            </select>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>แพคเกจ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
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
                                        <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-save"></i>&nbsp;บันทึก&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="btnSave" class="btn btn-danger" type="reset"><i class="fa fa-undo"></i>&nbsp;เริ่มใหม่&nbsp;</button></a>
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

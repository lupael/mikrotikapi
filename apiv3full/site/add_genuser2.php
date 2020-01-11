<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('conn.php');	
																																															
			$ARRAY = $API->comm("/ip/hotspot/user/profile/print");			
									   								
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
.style1 {font-weight: bold}
.style2 {font-size: 16px}
-->
</style>
</head>

<body>
 <!-- Page Content -->
      <section class="content">

            <div class="row">
                <div class= "col-md-6 col-md-offset-3">
		                   <div class="box box-solid box-primary">                            
		                         <div class="box-header">
		                             <h3 class="box-title"><i class="fa fa-users"></i> สร้าง ผู้ใช้แบบกลุ่ม A-Z </h3>    
		                        </div>
		                        <div class="panel-body">
		                           <form id="add_user" action="con_genuser2.php" method="post">
                                  		<div class="form-group input-group">
                                            <span class="input-group-addon"><strong>คำนำหน้าผู้ใช้</strong>&nbsp;</span>
                                            <input name="prefix" type="text" class="form-control" maxlength="3" placeholder="ภาษาอังกฤษเท่านั้นตัวอย่าง PT (สูงสุด 3 ตัวอักษร)">
                                     </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>จำนวน</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <input type="text" name="total" placeholder="Generate Total" class="form-control" required>
                                     </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>จำนวนชื่อผู้ใช้</strong></span>
                                            <select class="form-control" name="username" size="1" id="username">
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                              <option value="5">5</option>
                                              <option value="6" selected="selected">6</option>
                                              <option value="7">7</option>
                                              <option value="8">8</option>
                                              <option value="9">9</option>
                                              <option value="10">10</option>
                                            </select>
                                     </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>จำนวนรหัสผ่าน</strong>&nbsp;</span>
                                            <select class="form-control" name="password" size="1" id="password">
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                              <option value="5">5</option>
                                              <option value="6" selected="selected">6</option>
                                              <option value="7">7</option>
                                              <option value="8">8</option>
                                              <option value="9">9</option>
                                              <option value="10">10</option>
                                            </select>
                                     </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>แพกเกจเลือกให้ตรง</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
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
                                        <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-check"></i>&nbsp;Save&nbsp;</button>&nbsp;&nbsp;&nbsp;                                        <button id="btnSave" class="btn btn-danger" type="reset"><i class="fa fa-times"></i>&nbsp;Reset&nbsp;</button></a>
                                    </div> 
                                  </form>
		                        </div>		                        
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /#page-wrapper -->
        
            </section>
            <!-- /#wrapper -->
</body>
</html>

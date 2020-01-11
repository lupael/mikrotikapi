<?php	
	if(!empty($_REQUEST['name'])){
		if($_REQUEST['site']=='0'){
			echo "<script language='javascript'>alert('Please select site manage.')</script>";
			echo "<script language='javascript'>window.history.back()</script>";
		}else{
			$site=$_REQUEST['site'];
			mysql_query("INSERT INTO em VALUE('','".$_REQUEST['name']."','".$_REQUEST['user']."','".md5($_REQUEST['pass'])."','".$site."')");
			echo "<script language='javascript'>alert('Save Done')</script>";
			echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php?opt=cus_list\">";
			exit(0);
		}
	}							   								
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body>
 <!-- Page Content -->

            <div class="row">
                <div class="col-lg-12"><br/>
                        <div class="col-lg-2"></div>
		                <div class="col-lg-8">
		                    <div class="panel panel-info">                              
		                        <div class="panel-heading">
									เพิ่มผู้ดูและระบบ
		                        </div>
		                        <div class="panel-body">
		                           <form id="add_site" action="" method="post">    										
                                       <div class="form-group input-group">
                                            <span class="input-group-addon">ชื่อนามสกุล&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <input type="text" name="name" placeholder="นรากร ใจกล้า" class="form-control" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">กำหนดชื่อผู้ดูแลระบบ&nbsp;&nbsp;&nbsp;</span>
                                            <input type="text" name="user" placeholder="เช่น narakon" class="form-control" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">กำหนดรหัสผ่าน&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <input type="password" name="pass" placeholder="เช่น 1234567890" class="form-control">
                                        </div>       
										<div class="form-group input-group">
                                            <span class="input-group-addon">เลือกไซต์งานที่ดูแล</span>
                                            <select class="form-control" name="site" size="1" id="address">
                                            	<?php
													$conn = NEW mysqldb();	
													$sql="SELECT mt_name,mt_id FROM mt_config";
													$query=$conn->query($sql);
													echo '<option value="0"></option>';
													while($data=$conn->fetch($query)){																										
														echo '<option value="'.$data->mt_id.'">'.$data->mt_name.'</option>';
													}
												?>
                                            </select>
                                        </div>   
                                        
                                     <div class="form-group input-group">                                        
                                        <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-check"></i>&nbsp;บันทึก&nbsp;</button>&nbsp;&nbsp;&nbsp;                                        <button id="btnSave" class="btn btn-danger" type="reset"><i class="fa fa-times"></i>&nbsp;ยกเลิก&nbsp;</button></a>
                                    </div> 
                                    </form>
		                        </div>		                        
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /#page-wrapper -->
        
</body>
</html>

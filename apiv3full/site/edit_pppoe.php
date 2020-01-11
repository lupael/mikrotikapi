<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('conn.php');	
			include_once('../phpqrcode/qrlib.php');

			$ARRAY = $API->comm("/ppp/profile/print");
			
				if(!empty($_REQUEST['username'])){

					if($_REQUEST['username']==$_GET['id']){
						$user=$_GET['id'];
						$password=$_REQUEST['password'];					
						$username=$_REQUEST['username'];
						$profile=$_REQUEST['profile'];
						$img=$user.".png";
						$file=$username.".png";
						@unlink("../qrcode/".$img);
						QRcode::png('http://'.$ip.'/login?username='.$username.'&password='.$password.'', '../qrcode/'.$file.'');
						mysql_query("UPDATE mt_gen_pppoe SET user='".$_REQUEST['username']."', pass='".$_REQUEST['password']."', profile='".$_REQUEST['profile']."' WHERE user='".$user."'");
						
						$ARRAY = $API->comm("/ppp/secret/set", array(											
											"name"		=> $username,
											"password"  => $password,
											"profile"	=> $profile,
											"numbers"	=> $user,
								));		
						
						echo "<script>alert('ทำการแก้ไขผู้ใช้งาน PPPoE เรียบร้อยแล้ว.')</script>";
						echo "<meta http-equiv='refresh' content='0;url=index.php?opt=pppoe_list' />";
						exit();
					}else{

						$sql=mysql_query("SELECT user FROM mt_gen_pppoe where user='".$_REQUEST['username']."'");
						$num=mysql_num_rows($sql);						

						if($num==0){
							$user=$_GET['id'];
							$password=$_REQUEST['password'];					
							$username=$_REQUEST['username'];
							$profile=$_REQUEST['profile'];
							$img=$user.".png";
							$file=$username.".png";
							@unlink("qrcode/".$img);
							QRcode::png('http://'.$ip.'/login?username='.$username.'&password='.$password.'', 'qrcode/'.$file.'');
							mysql_query("UPDATE mt_gen_pppoe SET user='".$_REQUEST['username']."', pass='".$_REQUEST['password']."', profile='".$_REQUEST['profile']."',qrcode='".$file."' WHERE user='".$user."'");
							
							$ARRAY = $API->comm("/ppp/secret/set", array(											
												"name"		=> $username,
												"password"  => $password,
												"profile"	=> $profile,
												"numbers"	=> $user,
									));		
							
							echo "<script>alert('ทำการแก้ไขผู้ใช้งาน PPPoE เรียบร้อยแล้ว.')</script>";
							echo "<meta http-equiv='refresh' content='0;url=index.php?opt=pppoe_list' />";
							exit();
						}else{							
							echo "<script>alert('ไม่สามารถเปลี่ยนแปลงผู้ใช้งาน PPPoE = <".$username."> ได้.')</script>";							
						}
					}
				}
			
									   								
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
		                            เปลี่ยนแปลงข้อมูลผู้ใช้งาน
		                        </div>
		                        <div class="panel-body">
		                           <form id="add_pppoe" action="" method="post">
                                   <?php
								   		$result=mysql_fetch_array(mysql_query("SELECT * FROM mt_gen_pppoe WHERE user='".$_REQUEST['id']."'"));
								   ?>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">ชื่อผู้ใช้&nbsp;&nbsp;&nbsp;</span>
                                            <input type="text" name="username" placeholder="กรุณากรอกชื่อผู้ใช้งาน" class="form-control" value="<?php echo $result['user']; ?>" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">รหัสผ่าน&nbsp;</span>
                                            <input type="text" name="password" placeholder="กรุณากรอกรหัสผ่าน" class="form-control" value="<?php echo $result['pass']; ?>" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">แพคเกจ&nbsp;</span>
                                            <select class="form-control" name="profile" size="1" id="profile">   
											<option value="<?php echo $result['profile']; ?>"><?php echo $result['profile']; ?></option>
                                            	<?php
													$num =count($ARRAY);
													for($i=0; $i<$num; $i++){
														$seleceted = ($i == 0) ? 'selected="selected"' : '';
														if($ARRAY[$i]['name']!=$result['profile']){
															echo '<option value="'.$ARRAY[$i]['name'].$selected.'">'.$ARRAY[$i]['name'].'</option>';
														}
														
													}
												?>
                                          </select>
                                        </div>                                        
                                      
                                     <div class="form-group input-group">                                        
                                        <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-check"></i>&nbsp;Save&nbsp;</button>&nbsp;&nbsp;&nbsp;                                        
										<button id="btnCancel" class="btn btn-danger" type="reset"  Onclick="javascript:history.back()"><i class="fa fa-times"></i>&nbsp;Cancel&nbsp;</button>
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

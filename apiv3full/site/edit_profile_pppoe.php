<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('conn.php');	
																																												$profile=$_GET[name];		
			$Profile = $API->comm("/ppp/profile/print", array(
									"from" => $profile,
								));			
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
		                            รายละเอียดของแพจเกต PPPoE
		                        </div>
		                        <div class="panel-body">
		                           <form id="add_pppoe" action="con_editprofile_pppoe.php" method="post">
                                       <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Profile Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="name" placeholder="Profiles Name" class="form-control" value="<?php echo $Profile['0']['name'];?>" required>
											<input type="hidden" name="profile" value="<?php echo $_GET['name'];?>">
                                        </div>

                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Local Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="use" placeholder="Local Address" class="form-control"  value="<?php echo $Profile['0']['local-address'];?>" required>
                                        </div>

                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Pool Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="use" placeholder="remote-address" class="form-control"  value="<?php echo $Profile['0']['remote-address'];?>" required>
                                        </div>

                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><strong>Rate Limit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                                            <input type="text" name="limit" placeholder="Upload / Download" class="form-control"  value="<?php echo $Profile['0']['rate-limit'];?>">
                                        </div>										

									<div class="form-group input-group">                                        
                                        <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-check"></i>&nbsp;Save&nbsp;</button>&nbsp;&nbsp;&nbsp;                                        
										<button id="btnCancel" class="btn btn-danger" type="reset"  Onclick="javascript:history.back()"><i class="fa fa-times"></i>&nbsp;Cancel&nbsp;</button></a>
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

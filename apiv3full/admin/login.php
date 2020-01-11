<?php 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description 
 *
 * @author xeleniumz
 * 
 */
 include "../include/class.mysqldb.php";
 include "../include/config.inc.php";
 unset($_SESSION['EmpUser']);
 if(isset($_REQUEST['am_user'])){
	 $user = $_REQUEST['am_user'];
	 $pass = md5($_REQUEST['am_pass']);
	 $conn = new mysqldb();
	 $sql="SELECT * FROM am where am_user = '".$user."' and am_pass='".$pass."'";
	 $query = $conn ->query($sql);
	 $data = $conn->fetch($query);
	 
	 if($conn->num_rows()==0){
		 echo "<script language='javascript'>alert('Username or Password incorrect')</script>";
	 }else{
		unset($_SESSION['EmpUser']);
		$_SESSION['APIUser']=$data->am_user;
		$_SESSION['APIID']=$data->am_id;
		echo "<meta http-equiv='refresh' content='0;url=index.php' />";
		exit(0);
	 }
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>API - Administrator</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-size: 12px;
	font-weight: bold;
}
.style2 {
	color: #006600;
	font-size: 12px;
	font-weight: bold;
}
.style3 {color: #000099}
.style4 {
	color: #006600;
	font-weight: bold;
}
-->
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="style3"> ระบบจัดการ</span> Mikrotik <span class="style1">Mod</span> <span class="style2">by Lamyang Internet </span></h3>
                  </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="" name="login">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="am_user" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="am_pass" type="password" value="">
                                </div>
                                <div class="checkbox style4">กรุณาลงชื่อใช้งาน</div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">ตกลง</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery Version 1.11.0 -->
    <script src="../js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/sb-admin-2.js"></script>

</body>

</html>

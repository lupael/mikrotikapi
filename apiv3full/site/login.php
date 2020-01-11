<?php 
	include_once("../include/class.mysqldb.php");
	include_once("../include/config.inc.php");
    $username = "";
	$password = "";
	if(!isset($_SESSION['RDLogin'])) {
		$message = "";
		if(isset($_REQUEST['action'])) {
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];
			$sql = "SELECT * from am WHERE am_user = '".$_REQUEST['username']."' AND am_pass = '".md5($_REQUEST["password"])."'"; 
				echo $sql;
				$result = $link->query($sql);
				if($link->num_rows() == 0) {
					//echo "<script language='javascript'>alert('Username or Password incorrect')</script>";				
				} else {
					$data = mysql_fetch_object($result);
					$_SESSION['RDLogin'] = true;
					$_SESSION['RDUser'] = $data->am_user;										
					echo "<meta http-equiv='refresh' content='0;url=index.php' />";
					exit(0);
				}
			}
	
	$_SESSION['expire'] = $_SESSION['start'] + (30 * 60) ; // ending a session in 30
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mikrotik QR System</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Mikrotik QR Administrator</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="" name="login">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" value="<?php echo $username; ?>" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="<?php echo $password; ?>">
                                    <input type="hidden" name="action" id="action" value="login">
                                </div>
                                <div class="checkbox">
                                    <label>
                                       กรุณาลงชื่อเข้าใช้งาน
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
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
<?php
	} elseif (isset($_SESSION['RDLogin'])) {
        print "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>"; 
	} 
?>
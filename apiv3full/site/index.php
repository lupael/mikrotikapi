<?php
error_reporting(0);
	session_start();
	ob_start();
	include("../include/class.mysqldb.php");
	include("../include/config.inc.php");	
	
	
	
	
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  
 
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 

<script> 
	var chart;
	function requestDatta(interface) {
		$.ajax({
			url: 'data.php?interface='+interface,
			datatype: "json",
			success: function(data) {
				var midata = JSON.parse(data);
				if( midata.length > 0 ) {
					var TX=parseInt(midata[0].data);
					var RX=parseInt(midata[1].data);
					var x = (new Date()).getTime(); 
					shift=chart.series[0].data.length > 19;
					chart.series[0].addPoint([x, TX], true, shift);
					chart.series[1].addPoint([x, RX], true, shift);
					document.getElementById("trafico").innerHTML=TX + " / " + RX;
				}else{
					document.getElementById("trafico").innerHTML="- / -";
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) { 
				console.error("Status: " + textStatus + " request: " + XMLHttpRequest); console.error("Error: " + errorThrown); 
			}       
		});
	}	

	$(document).ready(function() {
			Highcharts.setOptions({
				global: {
					useUTC: false
				}
			});
	

           chart = new Highcharts.Chart({
			   chart: {
				renderTo: 'container',
				animation: Highcharts.svg,
				type: 'spline',
				events: {
					load: function () {
						setInterval(function () {
							requestDatta(document.getElementById("interface").value);
						}, 1000);
					}				
			}
		 },
		 title: {
			text: 'Monitoring'
		 },
		 xAxis: {
			type: 'datetime',
				tickPixelInterval: 150,
				maxZoom: 20 * 1000
		 },
		 yAxis: {
			minPadding: 0.2,
				maxPadding: 0.2,
				title: {
					text: 'Trafico',
					margin: 80
				}
		 },
            series: [{
                name: 'TX',
                data: []
            }, {
                name: 'RX',
                data: []
            }]
	  });
  });
</script>
<script>
function popup(url,name,windowWidth,windowHeight){      
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;   
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;     
    properties = "width="+windowWidth+",height="+windowHeight;  
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;     
    window.open(url,name,properties);  
}  
$(function () {
	
	/**
	 * Get the current time
	 */
	function getNow () {
	    var now = new Date();
	        
	    return {
	        hours: now.getHours() + now.getMinutes() / 60,
	        minutes: now.getMinutes() * 12 / 60 + now.getSeconds() * 12 / 3600,
	        seconds: now.getSeconds() * 12 / 60
	    };
	};
	
	/**
	 * Pad numbers
	 */
	function pad(number, length) {
		// Create an array of the remaining length +1 and join it with 0's
		return new Array((length || 2) + 1 - String(number).length).join(0) + number;
	}
	
	var now = getNow();
	
	// Create the chart
	$('#container1').highcharts({
	
	    chart: {
	        type: 'gauge',
	        plotBackgroundColor: null,
	        plotBackgroundImage: null,
	        plotBorderWidth: 0,
	        plotShadow: false,
	        height: 200
	    },
	    
	    credits: {
	        enabled: false
	    },
	    
	    title: {
	    	text: 'The Highcharts clock'
	    },
	    
	    pane: {
	    	background: [{
	    		// default background
	    	}, {
	    		// reflex for supported browsers
	    		backgroundColor: Highcharts.svg ? {
		    		radialGradient: {
		    			cx: 0.5,
		    			cy: -0.4,
		    			r: 1.9
		    		},
		    		stops: [
		    			[0.5, 'rgba(255, 255, 255, 0.2)'],
		    			[0.5, 'rgba(200, 200, 200, 0.2)']
		    		]
		    	} : null
	    	}]
	    },
	    
	    yAxis: {
	        labels: {
	            distance: -20
	        },
	        min: 0,
	        max: 12,
	        lineWidth: 0,
	        showFirstLabel: false,
	        
	        minorTickInterval: 'auto',
	        minorTickWidth: 1,
	        minorTickLength: 5,
	        minorTickPosition: 'inside',
	        minorGridLineWidth: 0,
	        minorTickColor: '#666',
	
	        tickInterval: 1,
	        tickWidth: 2,
	        tickPosition: 'inside',
	        tickLength: 10,
	        tickColor: '#666',
	        title: {
	            text: 'Powered by<br/>Highcharts',
	            style: {
	                color: '#BBB',
	                fontWeight: 'normal',
	                fontSize: '8px',
	                lineHeight: '10px'                
	            },
	            y: 10
	        }       
	    },
	    
	    tooltip: {
	    	formatter: function () {
	    		return this.series.chart.tooltipText;
	    	}
	    },
	
	    series: [{
	        data: [{
	            id: 'hour',
	            y: now.hours,
	            dial: {
	                radius: '60%',
	                baseWidth: 4,
	                baseLength: '95%',
	                rearLength: 0
	            }
	        }, {
	            id: 'minute',
	            y: now.minutes,
	            dial: {
	                baseLength: '95%',
	                rearLength: 0
	            }
	        }, {
	            id: 'second',
	            y: now.seconds,
	            dial: {
	                radius: '100%',
	                baseWidth: 1,
	                rearLength: '20%'
	            }
	        }],
	        animation: false,
	        dataLabels: {
	            enabled: false
	        }
	    }]
	}, 
	                                 
	// Move
	function (chart) {
	    setInterval(function () {
	        var hour = chart.get('hour'),
	            minute = chart.get('minute'),
	            second = chart.get('second'),
	            now = getNow(),
	            // run animation unless we're wrapping around from 59 to 0
	            animation = now.seconds == 0 ? 
	                false : 
	                {
	                    easing: 'easeOutElastic'
	                };
	                
	        // Cache the tooltip text
	        chart.tooltipText = 
				pad(Math.floor(now.hours), 2) + ':' + 
	    		pad(Math.floor(now.minutes * 5), 2) + ':' + 
	    		pad(now.seconds * 5, 2);
	        
	        hour.update(now.hours, true, animation);
	        minute.update(now.minutes, true, animation);
	        second.update(now.seconds, true, animation);
	        
	    }, 1000);
	
	});
});

// Extend jQuery with some easing (copied from jQuery UI)
$.extend($.easing, {
	easeOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
	}
});
</script>

       
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div id="wrapper">
<header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo ($_SESSION['APIUser']); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo ($_SESSION['APIUser']); ?> - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ($_SESSION['APIUser']); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="label label-primary pull-right">2</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php"><i class="fa fa-circle-o"></i> Dashboard</a></li>
			
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>PPPOE</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"> 3</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?opt=add_pppoe"><i class="fa fa-circle-o"></i> เพิ่มผู้ใช้งานเอง (หนึ่ง) </a></li>
            <li><a href="index.php?opt=add_genpppoe"><i class="fa fa-circle-o"></i> เพิ่มผู้ใช้งานกลุ่ม</a></li>
            <li><a href="index.php?opt=pppoe_list"><i class="fa fa-circle-o"></i> แสดงผู้ใช้งานทั้งหมด</a></li>
			<li><a href="index.php?opt=pppoeonline"><i class="fa fa-circle-o"></i> ผู้ใช้งาน PPPOE ออนไลน์</a></li>
          </ul>
        </li>
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-group"></i>
            <span>Hotspot</span>
            <span class="label label-primary pull-right"> 5</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?opt=add_user"><i class="fa fa-circle-o"></i>-เพิ่มผู้ใช้งานเอง (หนึ่ง) </a></li>
            <li><a href="index.php?opt=add_genuser"><i class="fa fa-circle-o"></i> เพิ่มผู้ใช้งานกลุ่มตัวเลข 0-9 </a></li>
            <li><a href="index.php?opt=add_genuser2"><i class="fa fa-circle-o"></i>เพิ่มผู้ใช้งานกลุ่มแบบ a-z</a></li>
			<li><a href="index.php?opt=user"><i class="fa fa-circle-o"></i>ดูบัตรที่สร้างและปริ้น</a></li>
		    <li><a href="index.php?opt=useronline"><i class="fa fa-circle-o"></i>ดูผู้ใช้ออนไลน์</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Packet</span>
           <span class="label label-primary pull-right"> 2</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?opt=add_profile"><i class="fa fa-circle-o"></i> เพิ่มแพคเกจ</a></li>
            <li><a href="index.php?opt=profile"><i class="fa fa-circle-o"></i> แสดงรายละเอียดแพคเกจ</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-line-chart"></i>
            <span>interface</span>
           <span class="label label-primary pull-right"> 1</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?opt=interface"><i class="fa fa-circle-o"></i>ดูสถานะ interface</a></li>
          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
                    
                      <? if(!isset($_REQUEST['opt'])) { ?>
                      <!-- Page Content -->
                      <?php
						include('../config/routeros_api.class.php');	
						include("conn.php");
						$ARRAY = $API->comm("/system/resource/print");
						$ram =	$ARRAY['0']['free-memory']/1048576;
						$hdd =	$ARRAY['0']['free-hdd-space']/1048576;	
							?>
                  
                    <div class="content-wrapper">
					 <section class="content-header">
      <h1>
        <?php echo " ".$ARRAY['0']['board-name'].""; ?>
        <small><?php echo "version ".$ARRAY['0']['version'].""; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
	<section class="content">
	
         <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text" >CPU Traffic</span>
              <span class="info-box-number" ><?php echo " ".$ARRAY['0']['cpu-load']."%"; ?></span>
			
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-arrow-graph-up-right"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">free-memory</span>
              <span class="info-box-number"><?php echo " ".round($ram,1)."MB"; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-archive"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">free-hdd-space</span>
              <span class="info-box-number"><?php echo "value ".round($hdd,1)."MB"; ?></span></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">User Online</span>
              <span class="info-box-number"><?php $ARRAY = $API->comm("/ip/hotspot/active/print", array(
    "count-only"=> "",
    "~active-address" => "1.1.",
));
echo($ARRAY);?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

	</div>
          
        
       <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
			<i class="fa fa-bar-chart-o"></i>
              <h3 class="box-title">Moniter Interface</h3>
			  
                
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
				<div class="chart">
				<div id="container" style="height: 400px;"></div>
                  </div>
  
				<select  name="interface"  id="interface">
                                            	<?php
													$ARRAY = $API->comm("/interface/print");
													$num =count($ARRAY);
													for($i=0; $i<$num; $i++){
														$seleceted = ($i == 0) ? 'selected="selected"' : '';
														echo '<option value="'.$ARRAY[$i]['name'].$selected.'">'.$ARRAY[$i]['name'].'</option>';
													}
												?>
                                            </select>
										
                </div>
                 <div class="col-md-4">
				 <p class="text-center">
                    <strong>Shotcut Menu</strong>
                  </p>
          <!-- Application buttons -->
              <a href="javascript:popup('index.php?opt=interface','',500,500)" class="btn btn-app">
			  <span class="badge bg-yellow"><?php $ARRAY = $API->comm("/interface/print", array(
												"count-only"=> "",
												
											));
											echo($ARRAY)?></span>
                <i class="fa fa-signal"></i> Interface
              </a>
              <a href="javascript:popup('index.php?opt=dhcp','',500,500)" class="btn btn-app">
                <span class="badge bg-yellow"><?php $ARRAY = $API->comm("/ip/dhcp-server/lease/print", array(
												"count-only"=> "",
												"~active-address" => "1.1.",
											));
											print_r($ARRAY)?></span>
                <i class="fa fa-laptop"></i> Dhcp lease
              </a>
             
              <a href="javascript:popup('index.php?opt=userall','',500,500)"class="btn btn-app">
                <span class="badge bg-purple"><?php $ARRAY = $API->comm("/ip/hotspot/user/print", array(
												"count-only"=> "",
												"~active-address" => "1.1.",
											));
											print_r($ARRAY)?></span></span>
                <i class="fa fa-users"></i> Users all
              </a>
			  <a href="javascript:popup('index.php?opt=useronline','',500,500)"class="btn btn-app">
                <span class="badge bg-teal"><?php $ARRAY = $API->comm("/ip/hotspot/active/print", array(
												"count-only"=> "",
												"~active-address" => "1.1.",
											));
											echo($ARRAY);?></span>
                <i class="fa fa-user-plus"></i> User online
              </a>
              <a href="javascript:popup('index.php?opt=profile','',500,500)"class="btn btn-app">
                <span class="badge bg-teal"><?php $ARRAY = $API->comm("/ip/hotspot/user/profile/print", array(
												"count-only"=> "",
												"~active-address" => "1.1.",
											));
											print_r($ARRAY)?></span>
                <i class="fa fa-folder-open"></i> Profile All
              </a>
			  
              
            
          
          <!-- /.box -->
              </div>
			  
              <!-- /.row -->
           
            </div>
            
          </div>
          
        </div>
        <!-- /.col -->
      </div>
	 
</section>
</div>
    <!-- /#wrapper -->
		 <?php
				 } else { 
            		include($_REQUEST['opt'] . ".php"); 
                 } 
          ?>
    <!-- jQuery Version 1.11.0 -->
   <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>

<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->

<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard2.js"></script>
   <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script src="../dist/js/demo.js"></script>	
<!-- AdminLTE for demo purposes -->

    
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
 <script type="text/javascript" src="../highchart/js/highcharts.js"></script>
   <script type="text/javascript" src="../highchart/js/highcharts-more.js"></script>
<script type="text/javascript" src="../highchart/js/modules/exporting.js"></script>
<script src="../../dist/js/app.min.js"></script>

</body>

</html>


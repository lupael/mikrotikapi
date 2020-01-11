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
        <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12"><br/>
                        <div class="col-lg-2"></div>
		                <div class="col-lg-8">
		                    <div class="panel panel-info">                              
		                        <div class="panel-heading">
		                          <p>&lt;?</p>
		                          <p>if(isset($_POST['submit']) &amp;&amp; $_POST['submit']=='submit'){<br />
		                            require('routeros_api.class.php');</p>
		                          <p>//confik connect</p>
		                          <p>$mikrotik_ip = '10.5.50.1';  // เปลี่ยน ip mikrotik เป็นของตัวเอง<br />
		                            $mikrotik_username = 'admin';  //   เปลี่ยน admin mikrotik เป็นของตัวเอง<br />
		                            $mikrotik_password = '1234';   //เปลี่ยน pass admin mikrotik เป็นของตัวเอง<br />
	                              </p>
		                          <p>$objCSV = fopen( &quot;username.csv&quot;, &quot;r&quot;); // Copy/Upload CSV<br />
	                              </p>
		                          <p>//$objCSV = fopen($_FILES[&quot;fileCSV&quot;][&quot;name&quot;], &quot;r&quot;);<br />
		                            while (($objArr = fgetcsv($objCSV, 1000, &quot;,&quot;)) !== FALSE) {</p>
		                          <p>//echo &quot;upload ok&lt;br&gt;&quot;;<br />
		                            $username_add=$objArr[0];    //user ดึงมาจาก .csv (col 1)<br />
		                            $password_add=$objArr[1];    //password ดึงมาจาก .csv (col 2)<br />
		                            $limit_uptime=$objArr[2];    // limit uptime  ตั้งให้ใช้ได้ กี่วัน ดึงมาจาก .csv (col 3)  (ex รูปแบบ 30d 00:00:00 คือใช้ได้  30วัน)<br />
  <br />
		                            $hotspot_server = 'hotspot1';    // เปลี่ยน hotspot server mikrotik เป็นของตัวเอง   ของผมมีอันเดียว hotspot1 fix ไว้เลย<br />
		                            $hotspot_profile =$objArr[3];         // เปลี่ยน  user profile เป็นของตัวเอง  ของผม  2m เป็นหลัก fix ไว้เลย<br />
  <br />
  <br />
		                            if($username_add  != '' ){<br />
  <br />
		                            ///// start<br />
		                            $API = new routeros_api();<br />
		                            // $API-&gt;debug = true;</p>
		                          <p>if ($API-&gt;connect($mikrotik_ip,$mikrotik_username,$mikrotik_password)){<br />
		                            //echo &quot;connect ok&lt;br&gt;&quot;;<br />
		                            $username=&quot;=name=&quot;.$username_add;</p>
		                          <p> $pass=&quot;=password=&quot;.$password_add;</p>
		                          <p> $server=&quot;=server=&quot;.$hotspot_server;</p>
		                          <p> $uptimes=&quot;=limit-uptime=&quot;.$limit_uptime;<br />
                                      <br />
		                            $profile=&quot;=profile=&quot;.$hotspot_profile;<br />
                                  </p>
		                          <p> //echo &quot;$username $pass $server $profile&lt;br&gt;&quot;;<br />
		                            $API-&gt;write('/ip/hotspot/user/add',false);<br />
		                            $API-&gt;write($username, false);<br />
		                            $API-&gt;write($pass, false);<br />
		                            $API-&gt;write($server, false);<br />
		                            $API-&gt;write($uptimes, false);<br />
		                            $API-&gt;write($profile);</p>
		                          <p> $items = $API-&gt;read();<br />
                                      <br />
		                            // Debug variable (return value)<br />
		                            //echo &quot;&lt;pre&gt;&quot;;<br />
		                            //print_r($items);<br />
		                            //echo &quot;&lt;/pre&gt;&quot;;</p>
		                          <p> $API-&gt;disconnect();<br />
		                            }<br />
  <br />
		                            ///// end<br />
  <br />
  <br />
  <br />
  <br />
  <br />
		                            }<br />
		                            }<br />
		                            fclose($objCSV);</p>
		                          <p>echo &quot;Upload &amp; Import Done.&quot;;<br />
		                            }<br />
		                            ?&gt;</p>
		                        </div>
		                        <div class="panel-body">
		                           <form id="add_user" action="con_adduser.php" method="post">
                                     <div class="form-group input-group">
                                     <span class="input-group-addon">Username</span></div>
                                        <div class="form-group input-group"></div>
                                        <div class="form-group input-group">
                                        <span class="input-group-addon">Profiles&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
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
                                        <button id="btnSave" class="btn btn-success" type="submit"><i class="fa fa-check"></i>&nbsp;Save&nbsp;</button>&nbsp;&nbsp;&nbsp;                                        <button id="btnSave" class="btn btn-danger" type="reset"><i class="fa fa-times"></i>&nbsp;Reset&nbsp;</button>
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

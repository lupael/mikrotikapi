<?php

include_once('../config/routeros_api.class.php');

$API = new routeros_api();

$API->debug = false;

if ($API->connect('192.168.99.1', 'admin', '')) {
echo "Connect";
}else{
echo "Disconnect";
}

?>

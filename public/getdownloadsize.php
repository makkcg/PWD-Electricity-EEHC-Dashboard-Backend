<?php
header('Content-Type: text/html; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
$fname= $_REQUEST["fname"];
if(file_exists($fname))
echo filesize($fname);
else 
echo "0";
?>
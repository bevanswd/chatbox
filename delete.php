<?php

//$uname = $_REQUEST['uname'];
//$msg = $_REQUEST['msg'];

$uname = (isset($_REQUEST['uname']) ? $_REQUEST['uname']:null);
$msg = (isset($_REQUEST['msg']) ? $_REQUEST['msg'] : null);





$con = mysql_connect('localhost','root','');
mysql_select_db('chatdb',$con);

mysql_query("TRUNCATE TABLE logs");
?>
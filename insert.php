<?php

//$uname = $_REQUEST['uname'];
//$msg = $_REQUEST['msg'];

$uname = (isset($_REQUEST['uname']) ? $_REQUEST['uname']:null);
$msg = (isset($_REQUEST['msg']) ? $_REQUEST['msg'] : null);





$con = mysql_connect('localhost','root','');
mysql_select_db('chatdb',$con);

mysql_query("INSERT INTO logs (`username` , `msg`) VALUES ('$uname', '$msg')");

$result1 = mysql_query("SELECT * FROM logs ORDER by id DESC");

while($extract = mysql_fetch_array($result1)) {
    echo "<span class = 'uname'>" . $extract['username'] . "</span>: <span class = 'msg'> " . $extract['msg'] . "</span><br/>";
}

?>
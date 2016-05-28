
<?php

$con = mysql_connect('localhost','root','');
mysql_select_db('chatdb',$con);
$result1 = mysql_query("SELECT * FROM logs ORDER by id DESC");
while($extract = mysql_fetch_array($result1)) {
    echo "<span class = 'uname'>" . $extract['username'] . "</span>: <span class = 'msg'> " . $extract['msg'] . "</span><br/><br/>";
}
?>﻿
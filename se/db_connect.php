<?php
$conn = mysql_connect('localhost', 'root', '0868676345');
mysql_query("SET NAMES UTF8");
if (!$conn) {  
    die('Not connected : ' . mysql_error());  
}    
$db_selected = mysql_select_db('codeerror_futsal', $conn);  
if (!$db_selected) {  
    die ('Error : ' . mysql_error());  
}  
?>
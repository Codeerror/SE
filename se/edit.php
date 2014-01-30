<?php
session_start();
if(empty($_SESSION['username'])){
	echo "<script>window.location = 'login_error.php';</script>";
}
include('db_connect.php');
function quote_smart($value)
{
    // Stripslashes
    if ( get_magic_quotes_gpc() )
    {
        $value = stripslashes( $value );
    }
    // Quote if not a number or a numeric string
    if ( !is_numeric( $value ) )
    {
         $value = "'" . mysql_real_escape_string($value) . "'";
    }
    return $value;
}
$name = quote_smart(mysql_real_escape_string($_POST['name']));
$username = quote_smart(mysql_real_escape_string($_POST['username']));
$password = quote_smart(mysql_real_escape_string(md5($_POST['password'])));
$password_new = quote_smart(mysql_real_escape_string(md5($_POST['password_new'])));
//echo $name." ".$username." ".$password." ".$password_new;
$cus_id = quote_smart(mysql_real_escape_string($_SESSION['cus_id']));
$edit_data = mysql_query("SELECT * FROM customer WHERE cus_id = $cus_id;");
$row_data_edit = mysql_fetch_array($edit_data);
$password_encode = quote_smart(mysql_real_escape_string($row_data_edit['password']));
//echo $row_data_edit['password']." ".$password;
if(empty($_POST['name']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password_new'])){
	echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove'></span> กรอกข้อมูลไม่ครบ</div>";
}else if($password_encode != $password){
	echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove'></span> รหัสเดิมไม่ถูกต้อง</div>";
}else{
	$sql_edit = "UPDATE customer SET name = $name, password = $password_new WHERE cus_id = $cus_id;";
	mysql_query($sql_edit);
	echo "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span> แก้ไขข้อมูลเรียบร้อย เปลี่ยนแปลงข้อมูลใน 3 วินาที...</div>";
	echo "<script>window.setTimeout(function() {window.location = 'index.php';}, 3000);</script>";
}
?>
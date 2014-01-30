<?php
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
$password_confirm = quote_smart(mysql_real_escape_string(md5($_POST['password_confirm'])));

//echo $name;
//echo $username;
//echo $password;
//echo $password_confirm;
if(empty($_POST['name']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password_confirm'])){
	echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove'></span> กรอกข้อมูลไม่ครบ</div>";
}else{
	$objQuery = mysql_query("SELECT username FROM customer WHERE username = $username;");
	$objResult = mysql_fetch_array($objQuery);
	if($objResult)
	{
		echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove'></span> มีชื่อผู้ใช้นี้ในระบบแล้ว</div>";
	}
	else if($password != $password_confirm)
	{
		echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove'></span> รหัสยืนยันไม่ถูกต้อง</div>";
	}else{
		echo "<div class='alert alert-success'>สมัครสมาชิกเรียบร้อย กำลังเข้าสู่ระบบใน 3 วินาที...</div>";
		mysql_query("INSERT INTO customer VALUES(0,$name,$username,$password);");
		echo "<script>window.setTimeout(function() {window.location = 'index.php';}, 3000);</script>";
	}
}
?>
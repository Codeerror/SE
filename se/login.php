<?php
session_start();
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
$username = quote_smart(mysql_real_escape_string($_POST['username']));
$password = quote_smart(mysql_real_escape_string(md5($_POST['password'])));
$objQuery = mysql_query("SELECT cus_id,username,password FROM customer WHERE username = $username AND password = $password;");
	$objResult = mysql_fetch_array($objQuery);
	if($objResult)
	{
		$_SESSION['username'] = $objResult['username'];
		$_SESSION['cus_id'] = $objResult['cus_id'];
		echo "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span> ยินดีต้อนรับคุณ <strong>$objResult[1] </strong>กำลังเข้าสู่ระบบใน 3 วินาที...</div>";
		echo "<script>window.setTimeout(function() {window.location = 'index.php';}, 3000);</script>";
	}else{
		echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove'></span> ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</div>";
	}
?>
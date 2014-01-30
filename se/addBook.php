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
function DateDiff($strDate1,$strDate2)
	{
		return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
	}

$field_id = quote_smart(mysql_real_escape_string($_POST['inputField']));
$activity = quote_smart(mysql_real_escape_string($_POST['inputActivity']));
$book_date = $_POST['inputDate'];
$start_time = quote_smart(mysql_real_escape_string($_POST['inputStart'].":00"));
$end_time = quote_smart(mysql_real_escape_string($_POST['inputEnd'].":00"));
echo $date;
$sql = "INSERT INTO booking VALUES(0,$activity,'F','$book_date',$start_time,$end_time,$_SESSION[cus_id],$field_id);";
//echo $sql;
$date_current = date('Y-m-d', time());
//echo $date." ".$date_current;
if(DateDiff($book_date,$date_current) > 0)
	{
		echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove'></span> วันผิดพลาด</div>";
	}else{
		mysql_query($sql);
		echo "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span> การจองเสร็จสมบูรณ์ กำลังบันทึกผลการจอง...</div>";
		echo "<script>window.setTimeout(function() {window.location = 'show_book.php';}, 3000);</script>";
	}
?>
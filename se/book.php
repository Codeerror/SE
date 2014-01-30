<?php
	session_start();
	if(empty($_SESSION['username'])){
		echo "<script>window.location = 'login_error.php';</script>";
	}
	include('db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>ระบบจองสนามฟุตซอลออนไลน์</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Jquery UI -->
<link href="css/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
<script src="js/jquery-ui-1.10.4.custom.min.js"></script>
<script>
	function regis(){
		$.ajax({
			type: "POST",
			url: "register.php",
			data: { name: $("#inputName").val(), username: $("#inputUser").val(), password:  $("#inputPassword").val(), password_confirm:  $("#inputPassword2").val()}
		})
		.done(function( msg ) {
			//alert( "Data Saved: " + msg );
			$("#regis_result").html(msg);
		});
	}
	function login(){
		$.ajax({
			type: "POST",
			url: "login.php",
			data: { username: $("#log_User").val(), password: $("#log_Password").val()}
		})
		.done(function( msg ) {
			//alert( "Data Saved: " + msg );
			$("#login_result").html(msg);
		});
	}
	function searchKeyPress(e)
    {
        // look for window.event in case event isn't passed in
        if (typeof e == 'undefined' && window.event) { e = window.event; }
        if (e.keyCode == 13)
        {
            document.getElementById('sing_up').click();
        }
    }
	function searchKeyPress_login(e)
    {
        // look for window.event in case event isn't passed in
        if (typeof e == 'undefined' && window.event) { e = window.event; }
        if (e.keyCode == 13)
        {
            document.getElementById('sing_in').click();
        }
    }
	 $(function() {
		$( "#inputDate" ).datepicker({ dateFormat: 'yy-mm-dd'});
	});
	function booking(){
		$.ajax({
			type: "POST",
			url: "addBook.php",
			data: { inputField: $("#inputField").val(), inputActivity: $("#inputActivity").val(), inputDate: $("#inputDate").val(), inputStart: $("#inputStart").val(), inputEnd: $("#inputEnd").val()}
		})
		.done(function( msg ) {
			//alert( "Data Saved: " + msg );
			$("#book_result").html(msg);
		});
	}
</script>
</head>
<body>
	<div class="navbar navbar-default navbar-static-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<!--<a class="navbar-brand" href="#">ระบบจองสนามฟุตซอลออนไลน์</a>-->
				<img src="img/kku.png" width="200" height="49" id="head_kku">
			</div>

			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">หน้าหลัก</a></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown">จองสนาม<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="book.php">จองสนาม</a></li>
							<li><a href="#">ตรวจสอบการจองสนาม</a></li>
							<li><a href="show_book.php">ตารางการจองสนาม</a></li>
						</ul>
					
					<li><a href="contact.php">ติดต่อเรา</a></li>
					</li>
				</ul>
				<form class="navbar-form navbar-right" role="form">
					<!--<div class="form-group">
              <input type="text" placeholder="Username" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>-->
					<button type="submit" class="btn btn-success" data-toggle="modal"
						data-target="#myModal">Sign up</button>
					<button type="submit" class="btn btn-success" data-toggle="modal"
						data-target="#Login">Sing in</button>
				</form>
			</div>
			<!--/.navbar-collapse -->
		</div>
	</div>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Sign up</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label for="inputName" class="col-sm-2 control-label">ชื่อ-สกุล</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputName"
									placeholder="ชื่อ-สกุล" onkeypress="searchKeyPress(event);">
							</div>
						</div>
						<div class="form-group">
							<label for="inputUser" class="col-sm-2 control-label">ชื่อผู้ใช้</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputUser"
									placeholder="ชื่อผู้ใช้" onkeypress="searchKeyPress(event);">
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword" class="col-sm-2 control-label">รหัสผ่าน</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="inputPassword"
									placeholder="รหัสผ่าน" onkeypress="searchKeyPress(event);">
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword2" class="col-sm-2 control-label">ยืนยันรหัสผ่าน</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="inputPassword2"
									placeholder="ยืนยันรหัสผ่าน" onkeypress="searchKeyPress(event);">
							</div>
						</div>
						<div class="form-group">
							<label for="xx" class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<div id="regis_result"></div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" id="bt_close">Close</button>
					<button type="button" class="btn btn-primary" onclick="regis()" id="sing_up">Sign in</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<div class="modal fade" id="Login" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Sing in</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label for="log_User" class="col-sm-2 control-label">ชื่อผู้ใช้</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="log_User"
									placeholder="ชื่อผู้ใช้" onkeypress="searchKeyPress_login(event);">
							</div>
						</div>
						<div class="form-group">
							<label for="log_Password" class="col-sm-2 control-label">รหัสผ่าน</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="log_Password"
									placeholder="รหัสผ่าน" onkeypress="searchKeyPress_login(event);">
							</div>
						</div>
						<div class="form-group">
							<label for="xx" class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<div id="login_result"></div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" onclick="login()" id="sing_in">Sing in</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<div class="jumbotron">
		<div class="container">
			<h1>ระบบจองสนามฟุตซอลออนไลน์</h1>
			<p>สำนักงานการกีฬา มหาวิทยาลัยขอนแก่น</p>
			<p>
				<a class="btn btn-primary btn-lg" role="button">จองสนาม &raquo;</a>
			</p>
		</div>
	</div>

	<div class="container">
		<form class="form-horizontal" role="form">
						<div class="form-group">
							<label for="inputField" class="col-sm-1 control-label">สนาม</label>
							<div class="col-sm-11">
								<select class="form-control" id="inputField">
								<?php 
									$result = mysql_query("SELECT * FROM field;"); 
									while($row = mysql_fetch_array($result)){
										echo "<option value=$row[field_id]>$row[field_name]</option>";
									}
								?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputActivity" class="col-sm-1 control-label">กิจกรรม</label>
							<div class="col-sm-11">
								<input type="text" class="form-control" id="inputActivity"
									placeholder="รายละเอียดกิจกรรม" onkeypress="searchKeyPress(event);">
							</div>
						</div>
						<div class="form-group">
							<label for="inputDate" class="col-sm-1 control-label">วันที่</label>
							<div class="col-sm-11">
								<input type="text" class="form-control" id="inputDate"
									placeholder="01(วัน)-01(เดือน)-2014(ปี)" onkeypress="searchKeyPress(event);">
							</div>
						</div>
						<div class="form-group">
							<label for="inputStart" class="col-sm-1 control-label">เวลาเริ่ม</label>
							<div class="col-sm-11">
								<input type="text" class="form-control" id="inputStart"
									placeholder="09:00 (เวลาเริ่มทำการ)" onkeypress="searchKeyPress(event);">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEnd" class="col-sm-1 control-label">เวลาสิ้นสุด</label>
							<div class="col-sm-11">
								<input type="text" class="form-control" id="inputEnd"
									placeholder="22:00 (เวลาหยุดทำการ)" onkeypress="searchKeyPress(event);">
							</div>
						</div>
						<div class="form-group">
							<label for="xx" class="col-sm-1 control-label"></label>
							<div class="col-sm-11">
								<div id="book_result"></div>
							</div>
						</div>
						<div class="form-group">
							<label for="xx" class="col-sm-1 control-label"></label>
							<div class="col-sm-11">
								<button type="button" class="btn btn-primary" onclick="booking()" id="">จองสนาม</button>
							</div>
						</div>
		</form>

		<hr>

		<footer>
			<p>&copy; สำนักงานการกีฬา มหาวิทยาลัยขอนแก่น</p>
		</footer>
	</div>
	
</body>
</html>
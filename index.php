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
<!-- System JavaScript -->
<script src="js/system.js"></script>
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
							<li><a href="check_book.php">ตรวจสอบการจองสนาม</a></li>
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
					<?php
						if(!isset($_SESSION['username'])) {
					?>
					<button type="submit" class="btn btn-success" data-toggle="modal"
						data-target="#myModal">Sign up</button>
					<button type="submit" class="btn btn-success" data-toggle="modal"
						data-target="#Login">Sing in</button>
					<?php
						}else{
					?>
					<button type="button" class="btn btn-success" data-toggle="modal"
						data-target="#edit"><span class='glyphicon glyphicon-user'></span><?php echo " ".$_SESSION['username']." "; ?></button>
					<button type="button" class="btn btn-success" onclick="logout()">Log Out</button>
					<?php
						}
					?>
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
	<?php
	$cus_id = quote_smart(mysql_real_escape_string($_SESSION['cus_id']));
	$edit_data = mysql_query("SELECT * FROM customer WHERE cus_id = $cus_id;");
	$row_data_edit = mysql_fetch_array($edit_data);
	?>
	<div class="modal fade" id="edit" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Edit</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label for="editName" class="col-sm-2 control-label">ชื่อ-สกุล</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="editName"
									placeholder="ชื่อ-สกุล" onkeypress="searchKeyPress(event);" value="<?php echo $row_data_edit['name']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="editUser" class="col-sm-2 control-label">ชื่อผู้ใช้</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="editUser"
									placeholder="ชื่อผู้ใช้" onkeypress="searchKeyPress(event);" value="<?php echo $row_data_edit['username']; ?>" disabled>
							</div>
						</div>
						<div class="form-group">
							<label for="editPassword" class="col-sm-2 control-label">รหัสผ่านเดิม</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="editPassword"
									placeholder="รหัสผ่านเดิม" onkeypress="searchKeyPress(event);">
							</div>
						</div>
						<div class="form-group">
							<label for="editPassword2" class="col-sm-2 control-label">รหัสผ่านใหม่</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="editPassword2"
									placeholder="รหัสผ่านใหม่" onkeypress="searchKeyPress(event);">
							</div>
						</div>
						<div class="form-group">
							<label for="xx" class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<div id="edit_result"></div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" id="bt_close">Close</button>
					<button type="button" class="btn btn-primary" onclick="edit()" id="sing_up">Save</button>
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
				<a class="btn btn-primary btn-lg" role="button" href="show_book.php">ตารางการจองสนาม &raquo;</a>
			</p>
		</div>
	</div>

	<div class="container">
		<!-- Example row of columns -->
		<div class="row">
			<div class="col-md-4">
				<img src="img/new1.jpg" width="100%" height="200">
				<h2>มข.ทุ่มงบกว่า 341ล้าน
					ย้ำชัด.!!พร้อมรับทัพนักกีฬามหาวิทยาลัยทั่วประเทศ</h2>
				<p>เมื่อวันจันทร์ที่ 2 ธันวาคม 2556
					คณะกรรมการบริหารกีฬามหาวิทยาลัยแห่งประเทศไทย (ก.ก.ม.ท.)
					ร่วมกับมหาวิทยาลัยขอนแก่น (มข.) และจังหวัดขอนแก่น
					แถลงข่าวการจัดการแข่งขันกีฬามหาวิทยาลัยแห่งประเทศไทยครั้งที่ 41
					“มอดินแดงเกมส์” ณ ห้องประชุมพีรสิทธิ์ คำนวณศิลป์
					วิทยาลัยการปกครองท้องถิ่น มหาวิทยาลัยขอนแก่น
					โดยได้รับเกียรติจากอธิการบดีทั่วประเทศ และคณะดำเนินงาน
					ตลอดจนทัพนักกีฬา และประชาชนทั่วไป ให้ความสนใจร่วมงานกว่า 400 คน

					“มอดินแดง” เป็นนามเรียกขานอีกนามหนึ่งของมหาวิทยาลัยขอนแก่น
					โดยเรียกตามภูมิประเทศที่เป็นที่ตั้งของมหาวิทยาลัย
					ซึ่งตั้งอยู่บนเนินดินลูกคลื่นสีแดง
					อันเป็นที่มาของการกำหนดชื่อแข่งขันกีฬามหาวิทยาลัยแห่งประเทศไทย
					ครั้งที่ …</p>
				<p>
					<a class="btn btn-default" href="#" role="button">อ่านเพิ่มเติม
						&raquo;</a>
				</p>
			</div>
			<div class="col-md-4">
			<img src="img/new2.jpg" width="100%" height="200">
				<h2>มข.จัดแถลงความพร้อมเป็นเจ้าภาพในงาน
					“นับถอยหลัง…สู่มอดินแดงเกมส์”</h2>
				<p>มหาวิทยาลัยขอนแก่นจัดแถลงความพร้อมเป็นเจ้าภาพในงาน
					“นับถอยหลัง…สู่มอดินแดงเกมส์” เมื่อวันที่ 25 กันยายน 2556 เวลา
					15.00 – 16.30 น. ณ ห้องสิริคุณากร 4 ชั้น 2 อาคารสิริคุณากร
					สำนักงานอธิการบดี มหาวิทยาลัยขอนแก่น
					ในฐานะเจ้าภาพจัดการแข่งขันกีฬามหาวิทยาลัยแห่งประเทศไทย ครั้งที่ 41
					“มอดินแดงเกมส์” ระหว่างวันที่ 14-22 …</p>
				<p>
					<a class="btn btn-default" href="#" role="button">อ่านเพิ่มเติม
						&raquo;</a>
				</p>
			</div>
			<div class="col-md-4">
			<img src="img/new3.jpg" width="100%" height="200">
				<h2>ศูนย์กีฬาแห่งจุฬาฯ ศึกษาดูงานกีฬา ม.ข.</h2>
				<p>เมื่อวันที่ 21 กันยายน 2556 เวลา 10.00 – 12.00 น. ณ ห้องประชุม 2
					กองกิจการนักศึกษาสำนักงานการกีฬา มหาวิทยาลัยขอนแก่น นำโดย ผศ.ดลชัย
					ศรีสำราญ ผู้ช่วยอธิการบดีฝ่ายพัฒนากีฬา, นายวิศิษฏ์ บุญสุชาติ
					หัวหน้าสำนักงานการกีฬา ให้การต้อนรับผู้บริหารและบุคลากรจาก
					ศูนย์กีฬาแห่งจุฬาลงกรณ์มหาวิทยาลัย นำโดย อาจารย์สุวัฒน์ กลิ่นเกษร
					รองผู้อำนวยการฝ่ายปฏิบัติการ ผศ.ดร.สุธนะ ติงศภัทิย์
					รองผู้อำนวยการฝ่ายบริหาร
					พร้อมบุคลากรศูนย์กีฬาแห่งจุฬาลงกรณ์มหาวิทยาลัย
					เข้าศึกษาดูงานสำนักงานการกีฬา มหาวิทยาลัยขอนแก่น
					การเข้าศึกษาดูงานและเยี่ยมชมสถานที่ในครั้งนี้
					ศูนย์กีฬาแห่งจุฬาลงกรณ์มหาวิทยาลัย
					หวังเข้าศึกษาดูงานด้านการจัดการอาคารสถานที่ …</p>
				<p>
					<a class="btn btn-default" href="#" role="button">อ่านเพิ่มเติม
						&raquo;</a>
				</p>
			</div>
		</div>

		<hr>

		<footer>
			<p>&copy; สำนักงานการกีฬา มหาวิทยาลัยขอนแก่น</p>
		</footer>
	</div>
	
</body>
</html>
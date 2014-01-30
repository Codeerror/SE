<!DOCTYPE html>
<html>
<head>
<title>ระบบจองสนามฟุตซอลออนไลน์</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
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
							<li><a href="#">จองสนาม</a></li>
							<li><a href="#">ตรวจสอบการจองสนาม</a></li>
							<li><a href="#">ตารางการจองสนาม</a></li>
						</ul>
					
					<li><a href="#">ติดต่อเรา</a></li>
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
						data-target="#myModal">Sign in</button>
					<button type="submit" class="btn btn-success" data-toggle="modal"
						data-target="#Login">Log in</button>
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
					<h4 class="modal-title" id="myModalLabel">Sign in</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label for="inputName" class="col-sm-2 control-label">ชื่อ-สกุล</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputName"
									placeholder="ชื่อ-สกุล">
							</div>
						</div>
						<div class="form-group">
							<label for="inputUser" class="col-sm-2 control-label">ชื่อผู้ใช้</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputUser"
									placeholder="ชื่อผู้ใช้">
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword" class="col-sm-2 control-label">รหัสผ่าน</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="inputPassword"
									placeholder="รหัสผ่าน">
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword2" class="col-sm-2 control-label">ยืนยันรหัสผ่าน</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="inputPassword2"
									placeholder="ยืนยันรหัสผ่าน">
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Sign in</button>
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
					<h4 class="modal-title" id="myModalLabel">Log in</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label for="inputUser" class="col-sm-2 control-label">ชื่อผู้ใช้</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputUser"
									placeholder="ชื่อผู้ใช้">
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword" class="col-sm-2 control-label">รหัสผ่าน</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="inputPassword"
									placeholder="รหัสผ่าน">
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Log in</button>
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
	<p align="center">
	<img src="img/contact.jpg" class="img-responsive" alt="สำนักงานการกีฬา มหาวิทยาลัยขอนแก่น"><br/>
		<b>ที่อยู่ :</b> สำนักงานการกีฬา มหาวิทยาลัยขอนแก่น<br/>

อาคารพลศึกษา 123 หมู่ 16 ต.ในเมือง อ.เมือง<br/>

จ.ขอนแก่น 40002<br/>

= = = = = = = = = = = = = = = = = = =<br/>

โทรศัพท์ 043 – 202778<br/>

= = = = = = = = = = = = = = = = = = =<br/>

โทรสาร 043 – 202778</p>
<br/><br/>
		<hr>

		<footer>
			<p>&copy; สำนักงานการกีฬา มหาวิทยาลัยขอนแก่น</p>
		</footer>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
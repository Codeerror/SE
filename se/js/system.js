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
	function error(){
		$.ajax({
			type: "POST",
			url: "login.php",
			data: { username: $("#error_User").val(), password: $("#error_Password").val()}
		})
		.done(function( msg ) {
			//alert( "Data Saved: " + msg );
			$("#error_result").html(msg);
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
	function logout(){
		$(this).load("logout.php");
		setTimeout('getgoing()', 100);
	}
	function getgoing()
	{
    window.location="index.php";
	}
	function edit(){
		$.ajax({
			type: "POST",
			url: "edit.php",
			data: { name: $("#editName").val(), username: $("#editUser").val(), password:  $("#editPassword").val(), password_new:  $("#editPassword2").val()}
		})
		.done(function( msg ) {
			//alert( "Data Saved: " + msg );
			$("#edit_result").html(msg);
		});
	}
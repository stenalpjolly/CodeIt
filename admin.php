<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
<title>CodeIT || Online Programming Contest</title>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="header"><p style="color:#000"><strong>M A COLLEGE OF ENGINEERING, KOTHAMANGALAM<br />
    ONLINE PROGRAMMING CONTEST</strong></p>
    </td>
  </tr>
  <tr>
    <td class="nav">
    <hr />
    <ul class="menu">

    <li> <a href="#" class="menu">HOME</a></li>
    <li> <a href="#" class="menu">FAQ</a></li>
    <li> <a href="#" class="menu">CONTACT US</a></li>
    <li> <a href="#" class="menu">FEEDBACK</a></li>
    
    </ul> <hr /></td>
  </tr>
  <tr>

    <td class="content">
    <div align="center">
    <br /><br /><table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
    <td class="login">
         <div class="user_login">
				<form id="login_form" method="POST" action="php/admin-login.php">
                    <?php
					   if(isset($_GET["valid"]))
					   {
					    $validate = $_GET["valid"];
					    if($validate<0)
					   		   echo '<p style="color:red;margin:0px;margin-bottom:5px;">Invalid username or password</p>';
					   }
					?>
					<label>Username</label>
					<input type="text" id="username" name="username" />
					<br />

					<label>Password</label>
					<input type="password" id="users_pass" name="users_pass" />
					<br />

					<div class="checkbox">
						<input id="remember" type="checkbox" />
						<label for="remember">Remember me on this computer</label>
					</div>

					<div class="action_btns">
						<div class="one_half"><a id="modal_trigger" href="#modal" class="btn btn_red btn-success"> Register</a></div>
						<div class="one_half last"><a href="#"  onclick="login_form.submit()" class="btn btn_red">Login</a></div>
                        
					</div>
				</form>
				<!----------------------------Temp ------------------------------>
                        <div id="modal" class="popupContainer" style="display:none;">
                            <header class="popupHeader">
                                <span class="header_title">Login</span>
                                <span class="modal_close"><i class="fa fa-times"></i></span>
                            </header>
                            
                            <section class="popupBody" style="color:#000">
                                <!-- Register Form -->
                                <div class="user_register">
                                    <form id="reg_form" method="POST" action="php/register.php">
                                        <label>Full Name</label>
                                        <input type="text" id="full_name" name="full_name" />
                                        <br />
                    
                                        <label>Email Address</label>
                                        <input type="email" id="email" name="email"/>
                                        <br />
                    
                                        <label>Password</label>
                                        <input type="password" id="pass" name="pass"/>
                                        <br />
                                        
                                        <label>Phone</label>
                                        <input type="text" id="phone" name="phone"/>
                                        <br />
                                        
                                        <label>College/Institution/Other Name</label>
                                        <input type="text" id="college" name="college"/>
                                        <br />
                    
                                        <div class="action_btns">
                                            <div class="one_half"><a id="close" href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Login</a></div>
                                            <div class="one_half last" onclick="reg_form.submit()"><a href="#"  class="btn btn_red">Register</a></div>
                                        </div>
                                    </form>
                                </div>
                            </section>
                        </div>
                        <!----------------------------/Temp------------------------------>
				<a href="#" class="forgot_password">Forgot password?</a>
			</div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
   </div>
    </td>
  </tr>
</table>
<div class="footer"><p>Designed &amp; Developed by Stenal P Jolly and Team<br />
      Computer Science Department<br />
      M A College of Engineering
    </p>
</div>
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
<script type="text/javascript">
	$("#modal_trigger").leanModal({top : 50, overlay : 0.6, closeButton: ".modal_close" });
 
	$(function(){
		// Calling Register Form
		$("#modal_trigger").click(function(){
			$(".user_register").show();
			$(".header_title").text('Register');
			return false;
		});
		
	    $('#close').click(function(e) {
            $('.popupContainer').css('display','none');
			$("#lean_overlay").fadeOut(200);
        });


	})
</script>
</body>
</html>
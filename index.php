<?php include 'inc/config.php'; ?>
<?php include 'inc/lang.php'; ?>
<?php
if(isset($_SESSION['email'])) {
 header("location: home.php");   
}
?>
<html>
<head>
	<title><?php echo DEFINE_TITLE_PAGE; ?></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="icon" href="imgs/favicon.png" type="image/png"/>
	<link rel="shortcut icon" href="imgs/favicon.png" type="image/png"/>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="js/slideshow.js"></script>
	<script> 
	$(document).ready(function(){
		$("#add_err").css('display', 'none', 'important');
		$("#submit-log").click(function(){	
			username=$("#email-log").val();
			password=$("#password-log").val();
			lan=$("#submit-log").val();

			$.ajax({
				type: "POST",
				url: "parse/login.php",
				data: "name="+username+"&pwd="+password,
				success: function(html){    
					if(html=='true')    {
						$("#add_err").html("<div class='success'><?php echo DEFINE_LOGGING_IN;?></div>");
						if (lan != 'Login!') {
							window.location="home.php?lan=bg";
						}else{
							window.location="home.php?lan=en";
						}
					}else{
						$("#add_err").css('display', 'inline', 'important');
						$("#add_err").html("<div class='error'><?php echo DEFINE_ERROR;?></div>");
					}
				},
				beforeSend:function(){
					$("#add_err").css('display', 'inline', 'important');
					$("#add_err").html("<img src='imgs/ajax-loader.gif' /> Loading...")
				}
			});
			return false;
		});

		$('#signup-form').submit(function(){
			var username = $('#username').val();
			var email = $('#email').val();
			var password = $('#password').val();
			var rpassword = $('#password2').val();
			var firstname = $('#firstname').val();
			var lastname = $('#lastname').val();
			var lan = $('#submit-reg').val();

			if (lan != 'Sign Up!') {
			$.post('parse/signup.php?lan=bg', {username: username, email: email, password: password, password2: rpassword, firstname: firstname, lastname: lastname}, function(data){
				$('#response').html(data);
				})
			}else{
			$.post('parse/signup.php?lan=en', {username: username, email: email, password: password, password2: rpassword, firstname: firstname, lastname: lastname}, function(data){
				$('#response').html(data);
				})
			};
			
			return false;
		});
	//Animation//
		$('#logo').animate({top:'+=150px' }, 300);
		$('#logo-txt').delay( 500 ).animate({top:'+=145px' }, 300);
		$('#lang').delay( 800 ).fadeIn(1400);
		$('#start').delay( 500 ).fadeIn( 400 );
		$('#welcome').fadeIn(1400);
	
	//Click event to scroll to top
	jQuery.fn.extend({scrollTo : function(speed, easing)
  	{
  		return this.each(function()
  		{
      		var targetOffset = $(this).offset().top + 85;
      		$('html,body').delay(300).animate({scrollTop: targetOffset}, 1000, easing);
    	});
    }
	});
		$('#regbutton').click(function(){
			$('#content-2').scrollTo(500);
		});

		$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	//Reg form clicked
	$('#getReg').click(function(){
		$('#getButtons').fadeOut('slow');
		$('#wrapper-reg').delay(1000).fadeIn('slow');
	});
	$('#close-reg').click(function(){
		$('#wrapper-reg').fadeOut('slow');
		$('#getButtons').delay(1000).fadeIn('slow');
	});
	//Log form clicked
	$('#getLog').click(function(){
		$('#getButtons').fadeOut('slow');
		$('#wrapper-log').delay(1000).fadeIn('slow');
	});
	$('#close-log').click(function(){
		$('#wrapper-log').fadeOut('slow');
		$('#getButtons').delay(1000).fadeIn('slow');
	});
	});
	</script> 
</head>
<body onload="Load()">
<div id="content-1">
	<img id="Img4" src="imgs/bg4.jpg" width="100%" height="100%">
	<img id="Img3" src="imgs/bg3.jpg" width="100%" height="100%">
	<img id="Img2" src="imgs/bg2.jpg" width="100%" height="100%">
	<img id="Img1" src="imgs/bg1.jpg" width="100%" height="100%">
	<img id="Sleft" src="imgs/arrow-left.png" onclick="previous()">
	<img id="Sright" src="imgs/arrow-right.png" onclick="next()">
	<div id="logo">
		<h1 id="logo-txt">N</h1>
	</div>
	<div id="welcome">
		<h2><?php echo DEFINE_TITLE; ?></h2>
	</div>
	<div id="start">
		<div id="regbutton"><?php echo DEFINE_BUTTON; ?></div>
	</div>
	<div id="lang">
		<a href="?lan=bg"><img id="bg" src="imgs/Bulgaria.png" label="Bulgarian" width="45" height="30"></a><br>
		<a href="?lan=en"><img id="en" src="imgs/United-Kingdom.png" label="English" width="45" height="30"></a>
	</div>
</div>
	<div id="content-2">

		</div>
		<div id="getButtons">
			<div id="getReg">
				<h1><?php echo DEFINE_GETREG; ?></h1>
			</div>
			<div id="getLog">
				<h1><?php echo DEFINE_GETLOG; ?></h1>
			</div>
		</div>
		<div id="wrapper-reg">
			<div id="close-reg">X</div>
		<h2><?php echo DEFINE_TITLE_REG; ?></h2>
		<div id="response"></div>
			<form method="POST" action="" id="signup-form">
				<input type="text" name="firstname" id="firstname" placeholder="<?php echo DEFINE_FIRSTNAME; ?>"><br/>
				<input type="text" name="lastname" id="lastname" placeholder="<?php echo DEFINE_LASTNAME; ?>"><br/>
				<input type="text" name="username" id="username" placeholder="<?php echo DEFINE_USERNAME; ?>"><br/>
				<input type="text" name="email" id="email" placeholder="<?php echo DEFINE_EMAIL; ?>"><br/>
				<input type="password" name="password" id="password" placeholder="<?php echo DEFINE_PASSWORD; ?>"><br/>
				<input type="password" name="password2" id="password2" placeholder="<?php echo DEFINE_PASSWORD2; ?>"><br/>
				<input type="submit" name="reg" id="submit-reg" value="<?php echo DEFINE_SUBMIT_REG; ?>">				
			</form>
		</div>
		<div id="wrapper-log">
			<div id="close-log">X</div>
		<h2><?php echo DEFINE_TITLE_LOG; ?></h2>
		<div class="err" id="add_err"></div>
			<form method="POST" action="./" id="log_form">
				<input type="text" name="name" id="email-log" placeholder="<?php echo DEFINE_EMAIL; ?>"><br/>
				<input type="password" name="word" id="password-log" placeholder="<?php echo DEFINE_PASSWORD; ?>"><br/>
				<input type="submit" name="login" id="submit-log" value="<?php echo DEFINE_SUBMIT_LOG; ?>">				
			</form>
		</div>
	</div>
	<a href="#" class="scrollToTop"><?php echo DEFINE_SCROLLTOP; ?></a>
</body>
</html>
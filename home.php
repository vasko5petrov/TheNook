<?php include 'inc/config.php'; ?>
<?php include 'inc/lang.php'; ?>
<?php include 'inc/nav.php'; ?>
<?php
if(!isset($_SESSION['email'])) {
 header("location: index.php");   
}
?>
<html>
<head>
	<title>The Nook</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/home/styles.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('.arrow_menu').click(function(){
			$('#list_menu').toggle();
		})
	});
	</script>
</head>
<body>
	<div id="timeline-banner"><h1><?php echo DEFINE_TIMELINE_BANNER; ?></h1></div>
	<div id="content">

		<div id="friend-suggestion">
			<div id="frs-title"><?php echo DEFINE_FRSUGGESTION; ?></div>
			<div id="frs-content">
				<?php
					 //get user info
					$email1 = $_SESSION['email'];
					$get_user = mysql_query("SELECT * FROM users WHERE email != '$email1' ORDER BY RAND() LIMIT 6");
					while($get = mysql_fetch_assoc($get_user)){
						$uname = $get['username'];
					    $fname = $get['firstname'];
					    $lname = $get['lastname'];
					    $from = $get['from'];
					    $profile_picture = $get['profile_picture'];
				?>
					<div id="frs-profile">
						<a href="profile.php?user=<?php echo $uname ?>"><img src="profile_pictures/<?php echo $profile_picture; ?>" width="35px" height="35px"></a>
						<a href="profile.php?user=<?php echo $uname ?>"><h2><?php echo $fname.' '.$lname; ?></h2></a>
						<div id="frs-addbtn"><p><?php echo DEFINE_FRSADDBTN; ?></p></div>
						<p><?php echo $from; ?></p>
						
					</div>
				<?php
					}
				?>
			</div>
		</div>
		<div id="test">
			<div id="frb-title"><?php echo DEFINE_FRBIRTH_TITLE; ?></div>
			<div id="frb-content">
				<?php
					 //get birthday
					$email1 = $_SESSION['email'];
					date_default_timezone_set('Europe/Sofia');
					$month = date('m');
					$day = date('d');
					$get_user = mysql_query("SELECT * FROM users WHERE MONTH(birth_date) = '$month' AND DAY(birth_date) = '$day' AND email != '$email1' ORDER BY RAND()");
					$check = mysql_num_rows($get_user);
					if ($check == "") {
					?>
					<div id="frb-profile0">
						<!--<div id="frb-btn1">Send message</div><div id="frb-btn2">Write on his timeline</div>-->
						<h2><?php echo DEFINE_FRBIRTH; ?></h2>
					</div>
			</div>
					<?php 
					}else{
					while($get = mysql_fetch_assoc($get_user)){
						$uname = $get['username'];
					    $fname = $get['firstname'];
					    $lname = $get['lastname'];
					    $from = $get['from'];
					    $profile_picture = $get['profile_picture'];
				?>
					<div id="frb-profile">
						<img id="frb-img" src="imgs/birthday.png" width="25" height="25">
						<!--<div id="frb-btn1">Send message</div><div id="frb-btn2">Write on his timeline</div>-->
						<a href="profile.php?user=<?php echo $uname ?>"><img id="frb-imgp" src="profile_pictures/<?php echo $profile_picture; ?>" width="35px" height="35px"></a><br>
						<a href="profile.php?user=<?php echo $uname ?>"><h2><?php echo $fname.' '.$lname; ?></h2></a>
						<button id="frb-btn1"><?php echo DEFINE_FRB_BTN1; ?></button><button id="frb-btn2"><?php echo DEFINE_FRB_BTN2; ?></button>
					</div>
				<?php
					}
					}
				?>	
		</div>
		<div id="newsfeed">
			<form method="POST" action="" id="post-form">
				<textarea id="txtarea-post" name="txtarea" placeholder="<?php echo DEFINE_PLACEHOLDER_POST; ?>"></textarea>
				<div id="pf-btns">
					<img id="upphoto-btn" src="imgs/upload-photo.png" width="25px" height="17px">
					<input id="submitp-form" type="submit" name="submitp-form" value="Post">
				</div>
			</form>
		</div>
		<div id="like-or-not">
			<div id="lon-title"><?php echo DEFINE_LIKEORNOT; ?></div>
			<div id="lon-content">
				<?php
					 //get user info
					$email1 = $_SESSION['email'];
					$get_user = mysql_query("SELECT * FROM users WHERE email != '$email1' ORDER BY RAND() LIMIT 0,1;");
					while($get = mysql_fetch_assoc($get_user)){
						$uname = $get['username'];
					    $fname = $get['firstname'];
					    $lname = $get['lastname'];
					    $from = $get['from'];
					    $profile_picture = $get['profile_picture'];
					    ?>
					<div id="lon-profile">
						<a href="profile.php?user=<?php echo $uname ?>"><img src="profile_pictures/<?php echo $profile_picture; ?>" width="35px" height="35px"></a>
						<a href="profile.php?user=<?php echo $uname ?>"><h2><?php echo $fname.' '.$lname; ?></h2></a>
						<div id="lon-likebtn"><p><?php echo DEFINE_LONLIKEBTN; ?></p></div>
						<div id="lon-notbtn"><p><?php echo DEFINE_LONNOTBTN; ?></p></div>
						<p><?php echo $from; ?></p>
					</div>
				<?php
					}
				?>
			</div>
		</div>
	</div>
	<div id="footer">
	</div>
</body>
</html>
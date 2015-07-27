<?php include 'inc/config.php'; ?>
<?php include 'inc/lang.php'; ?>
<?php include 'inc/nav.php'; ?>
<?php
if(!isset($_SESSION['email'])) {
 header("location: index.php");   
}
if(isset($_GET['user'])) {
	$user = $_GET['user'];
}
$query = mysql_query("SELECT * FROM users WHERE username = '$user'");
$get = mysql_fetch_assoc($query);
$fname = $get['firstname'];
$lname = $get['lastname'];
?>
<html>
<head>
	<title><?php echo $fname.' '.$lname ?></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/profile/styles.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('.arrow_menu').click(function(){
			$('#list_menu').toggle();
		})
			$('#profile-picture').animate({'top': '50'}, 800);
	});
	</script>
</head>
<body>
	<?php
		$email1 = $_SESSION['email'];
		$get_user = mysql_query("SELECT * FROM users WHERE email != '$email1' ORDER BY RAND() LIMIT 0,1;");
			$uname = $get['username'];
		    $fname = $get['firstname'];
		    $lname = $get['lastname'];
		    $from = $get['from'];
		    $profile_picture = $get['profile_picture'];
			$poster_picture = $get['poster_picture'];
	?>
	<div id="back-poster">
		<img id="poster-img" src="poster_pictures/<?php echo $poster_picture; ?>">
	</div>
	<div id="profile-picture">
		<img src="profile_pictures/<?php echo $profile_picture; ?>" width="155px" height="155px"><p><?php echo $fname.' '.$lname; ?></p>
	</div>
	<div id="content">
		<div id="test">
			<div id="frb-title">something</div>
			<div id="frb-content">
			</div>
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
		<div id="friends">
			<div id="frs-title">something</div>
			<div id="frs-content"></div>
		</div>

	</div>
	<div id="footer">
	</div>
</body>
</html>
</html>
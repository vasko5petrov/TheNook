<?php
	 //get user info
	$email1 = $_SESSION['email'];
	$get_user = mysql_query("SELECT * FROM users WHERE email ='$email1'");
	$get = mysql_fetch_assoc($get_user);
    $fname = $get['firstname'];
    $lname = $get['lastname'];
    $user = $get['username'];
?>
<link rel="icon" href="imgs/favicon.png" type="image/png"/>
<link rel="shortcut icon" href="imgs/favicon.png" type="image/png"/>
<div id="navbar">
		<div id="logo">
			<h1 id="logo-txt"><?php     
				if (isset($_GET['lan'])){
		    		if ($_GET['lan'] == 'bg'){
		    			echo '<a href="home.php?lan=bg">N</a>';
		    		}else{
		    			echo '<a href="home.php?lan=en">N</a>';
		    		}
		   		}else{
		    		echo '<a href="home.php?lan=en">N</a>';
		    	} 
			?>
			</h1>
		</div>
		<div class="search_box">
				<form action="home.php" method="post" id="search">
					<input id="search_field" type="text" name="search" size="60" placeholder="<?php echo DEFINE_SEARCH; ?>"  autocomplete="off" onkeyup="searchq();">
					<div id="output"></div>
				</form>				
		</div>
		<div id="links">
			<div id="top-links">
				<a href="friends.php"><img id="pic" src="imgs/friends1.png" width="20px" height="20px"></a>
				<a href="messages.php"><img id="pic" src="imgs/messages1.png" width="20px" height="20px"></a>
				<a href="notification.php"><img id="pic" src="imgs/notification1.png" width="20px" height="20px"></a>
				<a href="videos.php"><?php echo DEFINE_VIDEOS_LINK; ?></a>
				<a href="profile.php?user=<?php echo $user ?>"><img id="pic" src="imgs/uname1.png" width="20px" height="20px"><?php echo "$fname"; ?></a>
				<img class="arrow_menu" id="pic" src="imgs/arrow-down.png" width="15px" height="15px">
			</div>
			<ul id="list_menu">
				<li><a href="settings.php"><?php echo DEFINE_SETTINGS_B; ?></a></li>
				<li><a href="about.php"><?php echo DEFINE_ABOUT_B; ?></a></li>
				<li><a href='logout.php'><?php echo DEFINE_LOGOUT; ?></a></li>
			</ul>
		</div>
	</div>
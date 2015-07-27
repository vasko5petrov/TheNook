<?php include '../inc/config.php'; ?>
<?php 

if (isset($_POST['username']) && isset($_POST["password"])){

	$username = strip_tags(@$_POST['username']);
	$password = strip_tags(@$_POST['password']);
	$rpassword = strip_tags(@$_POST['password2']);
	$email = strip_tags(@$_POST['email']);
	$firstname = strip_tags(@$_POST['firstname']);
	$lastname = strip_tags(@$_POST['lastname']);

	$query = mysql_query("SELECT * FROM users WHERE username='$username'");
	$check_username = mysql_fetch_assoc($query);
	$check_username2 = mysql_num_rows($query);
	
	if ($username&&$password&&$rpassword&&$email&&$firstname&&$lastname){
	if (strlen($username)>25||strlen($firstname)>25||strlen($lastname)>25){
		if(isset($_GET['lan'])){
			if ($_GET['lan'] == 'bg')
			{
				echo "<div class='error'>Може да използвате максимум 25 символа за име, фамилия и потребителско име!</div>";
			}
			else
			{
				echo "<div class='error'>You can only use up to 25 characters for your username, firstname and lastname!</div>";
			}
		}
	}else if($check_username == "") {

		$query2 = mysql_query("SELECT * FROM users WHERE email='$email'");
		$check_email = mysql_fetch_assoc($query2);
		if ($check_email == "") {

		if($password == $rpassword) {
		if (strlen($password)>30||strlen($password)<8) 
		{
			if(isset($_GET['lan'])){
				if ($_GET['lan'] == 'bg')
				{
					echo "<div class='error'>Дължината на паролата трябва да е между 8 и 30 символа!</div>";
				}
				else
				{
					echo "<div class='error'>Your password must be between 8 and 30 characters long!</div>";
				}
			}
		}else{

		$sha1password = sha1($password);

		mysql_query("INSERT INTO users VALUES('','$firstname','$lastname','$username','$email','$sha1password','','','')");
			if(isset($_GET['lan'])){
				if ($_GET['lan'] == 'bg')
				{
					echo "<div class='success'>Вашият акаунт е създаден!</div>";
				}
				else
				{
					echo "<div class='success'>Your account has been made!</div>";
				}
			}
		}
		}else if($password != $rpassword) {
			if(isset($_GET['lan'])){
				if ($_GET['lan'] == 'bg')
				{
					echo "<div class='error'>Паролите не съвпадат!</div>";
				}
				else
				{
					echo "<div class='error'>Passwords doesn't match!</div>";
				}
			}
		}

		}else if($check_email != "") {
			if(isset($_GET['lan'])){
				if ($_GET['lan'] == 'bg')
				{
					echo "<div class='error'>Потребител с този имейл вече е регистриран!</div>";
				}
				else
				{
					echo "<div class='error'>Email is already being used!</div>";
				}
			}
		}

		}else if($check_username != "") {
			if(isset($_GET['lan'])){
				if ($_GET['lan'] == 'bg')
				{
					echo "<div class='error'>Потребителското име вече съществува!</div>";
				}
				else
				{
					echo "<div class='error'>Username already being used</div>";
				}
			}
		}
		}else{
			if(isset($_GET['lan'])){
				if ($_GET['lan'] == 'bg')
				{
					echo "<div class='error'>Моля попълнете всички полета!</div>";
				}
				else
				{
					echo "<div class='error'>Please fill in all of the fields!</div>";
				}
			}
		}
}
?>
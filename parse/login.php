<?php
require_once 'config.php';

session_start();
$email = $_POST['name'];
$pWord = sha1($_POST['pwd']);
$res = mysql_query("SELECT * FROM users WHERE email = '$email' AND password = '$pWord'");
$num_row = mysql_num_rows($res);
$row=mysql_fetch_assoc($res);
if( $num_row == 1 ) {
	echo 'true';
	$_SESSION['email'] = $row['email'];
	}
else {
	echo 'false';
}
?>
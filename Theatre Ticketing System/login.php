<?php

session_start();

$con = mysqli_connect("localhost", "root", "");

mysqli_select_db($con, 'tts_db');

$username = $_POST['username'];
$password = $_POST['password'];

$s= " SELECT * from admin_tbl where admin_user = '$username' && admin_pass = '$password' " ;

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if( $num == 1){
	$_SESSION['admin_user'] = $username;
	echo" <script>alert('Log in Successful')</script>";
	echo "<script>window.location.href = 'dashboard.php'</script>";
}else{
	echo " <script>alert('Wrong username or password')</script>";
	echo "<script>window.location.href = 'index.php'</script>";
}
?>
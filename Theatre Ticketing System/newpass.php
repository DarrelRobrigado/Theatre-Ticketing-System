<?php
session_start();
$_SESSION['admin_user'];
$connection = mysqli_connect("localhost", "root", "", "tts_db");



if (count($_POST)>0) {

		$result = mysqli_query($connection, "SELECT *from admin_tbl WHERE admin_user='" . $_SESSION['admin_user'] . "'");
		$row = mysqli_fetch_array($result);

		if($_POST["confpass"] == $_POST["newpass"]){
			if($_POST["confpass"] && $_POST["newpass"] != $row["admin_pass"]){
				mysqli_query($connection, "UPDATE admin_tbl set admin_pass='" . $_POST["confpass"] . "' WHERE admin_user='" . $_SESSION['admin_user'] . "'");
				echo "<script>alert('Password Successfully changed')</script>";
				echo "<script>window.location.href='dashboard.php'</script>";
			}else{
				echo "<script>alert('This is the old password')</script>";
				echo "<script>window.location.href='settings.php'</script>";
			}
		}else{
			echo"<script>alert('Password is not the same')</script>";
			echo "<script>window.location.href='settings.php'</script>";

		}
	}

?>
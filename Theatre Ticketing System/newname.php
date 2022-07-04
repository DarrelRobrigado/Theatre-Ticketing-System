<?php
session_start();
$_SESSION["admin_user"];
$connection = mysqli_connect("localhost", "root", "", "tts_db");

if (count($_POST)>0) {

		$result = mysqli_query($connection, "SELECT *from admin_tbl WHERE admin_user='" . $_SESSION["admin_user"] . "'");
		$row = mysqli_fetch_array($result);
		$num = mysqli_num_rows($result);

		if($_POST["confName"] == $_POST["newName"]){
			if($_POST["confName"]&&$_POST["newName"] != $row["admin_user"]){
				
				mysqli_query($connection, "UPDATE admin_tbl set admin_user='" . $_POST["confName"] . "' WHERE admin_user='" . $_SESSION["admin_user"] . "'");
				echo "<script>alert('Username Successfully changed')</script>";
				echo "<script>window.location.href='index.php'</script>";
			}else{
				echo "<script>alert('This is the old username')</script>";
				echo "<script>window.location.href='settings.php'</script>";
			}
		}else{
			echo"<script>alert('Username is not the same')</script>";
			echo "<script>window.location.href='settings.php'</script>";
		}
	}

?>
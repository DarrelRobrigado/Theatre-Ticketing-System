<?php
	$con = mysqli_connect("localhost", "root", "","tts_db");
	$req=$_GET['request'];
	$id=$_GET['id'];
	mysqli_query($con, "UPDATE cust_tbl set cust_status=1 WHERE play_id='$req' && cust_count='$id'");
	echo  "<script>window.location.href='play.php?request=".$_GET['request']."'</script>";
?>
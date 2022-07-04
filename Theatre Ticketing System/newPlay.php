<?php
session_start();

$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, 'tts_db');

$event = $_POST['event'];
$price = $_POST['price'];
$start = $_POST['start'];
$ticketNo = $_POST['ticketNo'];

$s= " SELECT * from play_tbl where play_title= '$event' " ;

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if( $num == 1){
	echo" <script>alert('Event already exists')</script>";
	echo"<script>window.location.href='create.php'</script";
}else{
	$reg= " INSERT into play_tbl(play_title,play_price,play_start, play_ticket) values ('$event', '$price','$start','$ticketNo')";	
	mysqli_query($con, $reg);
	echo " <script>alert('Event successfully created')</script>";
	echo "<script>window.location.href='dashboard.php'</script>";
}
?>
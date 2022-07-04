<?php

	session_start(); 

	if(!isset($_SESSION['admin_user'])){
		header('location:index.php');
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/create.css">
		<title>Theater Ticketing System</title>
	</head>

<body>
		<div class="navbar">
			<a href="create.php"><img src="css/pictures/plus.png" class="plus"></a>
			<a href="dashboard.php" class="title">Theater Ticketing System</a>
			<div class="dropdown">

			    <button class="dropbtn"><img src="css/pictures/user.png" class="user">
			    <i class="fa fa-caret-down"></i>
			    </button>

				    <div class="dropdown-content">
					    <a href="settings.php">Settings</a>
					    <a href="logout.php">Log Out</a>
				    </div>
				    <h1> <?php echo $_SESSION['admin_user']; ?></h1>
			</div>
		</div>
		
		<p class="dashboardtitle">Create New Event/Play</p>

		<form action="newPlay.php" method="post" class="create">
			<input id="tbox" type="text" placeholder="Event/Play Title" name="event" required><br>
			<input id="tbox" type="Number" placeholder="Ticket Price" name="price" required><br>
			<input id="tbox" type="Number" placeholder="Starting Ticket Number" name="start" required><br>
			<input id="tbox" type="number" placeholder="Number of Tickets" name="ticketNo" required><br>

		<!--After clicking create button, babalik sa dashboard with the added play-->
			<button type="submit" id="create">Create</button>
		</form>

		<script type="text/javascript" src="create.js"></script>
</body>

</html>
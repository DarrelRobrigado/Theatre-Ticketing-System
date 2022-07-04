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
	<link rel="stylesheet" href="css/settings.css">
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

	<p class="dashboardtitle">Account Settings</p>

	<form name="frmChange"action="newpass.php" method="post" class="create" onsubmit="return validatePassword()">
		<label>Change Password</label><br>
		<input id="tbox" type="password" placeholder="New Password" name="newpass" required><br>
		<input id="tbox" type="password" placeholder="Confirm Password" name="confpass" required><br>
		
		<input type="submit" name="update" id="save" value="Save">
	</form>
	<form name="frmChange2"action="newname.php" method="post" class="create">
		<br><br><br><label class="changeuname">Change Username</label><br>
		<input id="tbox" type="text" placeholder="New Username" name=newName required><br>
		<input id="tbox" type="text" placeholder="Confirm New Username" name="confName" required><br>
		<button name="updater" id="save">Save</button>
	</form>
		
</body>

</html>
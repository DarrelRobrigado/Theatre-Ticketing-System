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
		<link rel="stylesheet" href="css/dashboard.css">
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
		<p class="dashboardtitle">Plays/Events Title</p>


<!--Search form for searching through database of play tables--> 

		
		<form action="dashboard.php" method="POST"class="example">
			<div class="input-group">
		  		<div class="input-group-append">
		  			<button name= "submit" type="submit" class="btn btn-info btn-lg rounded-0">Search</button>
		  		</div>
		  		<input type="text" placeholder="Search" name="search" id="eventSearch" class="form-control form-control=lg rounded-0 border-info"autocomplete="off" required>		 		  		
		  	</div>
		</form>


<!--TABLE FOR DATABASE OF PLAY TABLES-->
<!--Once clicked, must redirect to clicked table-->

		<table class="table">
			<?php			
				if(isset($_POST['submit']))
				{
					$id = $_POST['search'];
					$sql= "SELECT * from play_tbl where CONCAT (play_title) like '%".$id."%'" ;
					$search_result=filterTable($sql);
					if(mysqli_num_rows($search_result) > 0)
    				{
      					while ($row = mysqli_fetch_array($search_result))
      					{
							echo'<tr><th><a href="play.php?request='.$row['play_id'].'">'.$row["play_title"].'</a></th></tr>';
						}
						echo "</table>";
					}else{
						echo "<tr><th>No Result</th></tr>";
					}
					mysqli_free_result($search_result);
				} else {
   					$sql = "SELECT * FROM play_tbl";
    				$search_result = filterTable($sql);
      				while ($row = mysqli_fetch_array($search_result))
      					{
							echo"<tr><th><a href='play.php?request=".$row['play_id']."'>".$row["play_title"]."</a></th></tr>";
						}
					
				}
				function filterTable($sql)
				{
    				$connect = mysqli_connect("localhost", "root", "", "tts_db");
    				$filter_Result = mysqli_query($connect, $sql);
    				return $filter_Result;
				}
			?>

		</table>
		
	</body>
</html>
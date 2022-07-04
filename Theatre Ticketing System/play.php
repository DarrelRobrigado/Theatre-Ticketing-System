<?php
	$conn= mysqli_connect("localhost", "root","","tts_db");
	session_start(); 
	if(!isset($_SESSION['admin_user'])){
		header('location:index.php');
	}

		
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/play.css">
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

	<a href="play.php?request=<?php echo $_GET['request']?>" class="title">
	<p class="dashboardtitle">
		<?php 
		
		$req=$_GET['request'];

		$s="SELECT * FROM play_tbl where play_id='$req'";
		$q=mysqli_query($conn,$s);
		$r=mysqli_fetch_array($q);
		$sql="SELECT * FROM cust_tbl where play_id='$req' limit ".$r['play_ticket']."";
		$query=mysqli_query($conn,$sql);
		$num = mysqli_num_rows($query);
		$row=mysqli_fetch_array($query);
			echo $r['play_title'];
		?>
	</p></a>
	<p class="ticketstatus">
		
		<?php 
		echo $num;
		?>/
		<?php 
			echo $r['play_ticket'];
		?> 
			</p>

	<form  method="POST"class="example">
			<div class="input-group">
		  		<div class="input-group-append">
		  			<button name= "submit" type="submit" id="button" >Search</button>
		  		</div>
		  		<input type="text" placeholder="Search" name="search" id="custSearch" autocomplete="off" required>		 		  		
		  	</div>
	</form>
	
		<table class="table">
			<tr>
				<th>Ticket Number</th>
				<th>Buyer's Name</th>
				<th>Date Bought</th>
				<th>Paid Status</th>
			</tr>
			<?php
			 if(isset($_POST['submit']))
				{

					$id = $_POST['search'];
					$sq= "SELECT * from cust_tbl where cust_count=$id && play_id = $req limit 1" ;
					$search_result=filterTable($sq);
					if(mysqli_num_rows($search_result) > 0)
    				{

      					while ($row = mysqli_fetch_array($search_result))
      					{
							if($row['cust_status']==1)
							{	
								echo
									'<tr>
										<td>'.$row["cust_count"].'</td>
										<td>'.$row["cust_name"].'</td>
										<td>'.$row['cust_date'].'</td>
										<td>
											<label class="container">Paid
											<input type="checkbox" checked="checked">
											<span class="checkmark"></span>
											</label>
										</td>
									</tr>';
							}else{
								echo
									'<tr>
										<td>'.$row["cust_count"].'</td>
										<td>'.$row["cust_name"].'</td>
										<td>'.$row['cust_date'].'</td>
										<td>
											<a href="update.php?request=' .$_GET['request'].'&id='.$row['cust_count'].'" id="pay"><label class="container">Unpaid
											
											</label></a>
										</td>
									</tr>';
							}				
						}
						echo "</table>";
					}else{
						echo
						"<tr>
							<td>No Result</td>
							<td>No Result</td>
							<td>No Result</td>
							<td>No Result</td>
						</tr>";
					}
					mysqli_free_result($search_result);
				} else {
   					$sq="SELECT * FROM cust_tbl where play_id='$req' limit ".$r['play_ticket']."";
    				$search_result = filterTable($sq);
      				if(mysqli_num_rows($search_result) > 0){
      					
      					while ($row = mysqli_fetch_array($search_result))
      					{
						if($row['cust_status']==1)
							{	
								echo
									'<tr>
										<td>'.$row["cust_count"].'</td>
										<td>'.$row["cust_name"].'</td>
										<td>'.$row['cust_date'].'</td>
										<td>
											<label class="container">Paid
											<input type="checkbox" checked="checked">
											<span class="checkmark"></span>
											</label>
										</td>
									</tr>';
							}else{
								echo
									'<tr>
										<td>'.$row["cust_count"].'</td>
										<td>'.$row["cust_name"].'</td>
										<td>'.$row['cust_date'].'</td>
										<td>
											<a href="update.php?request=' .$_GET['request'].'&id='.$row['cust_count'].'" id="pay"><label class="container">Unpaid
											
											</label></a>
										</td>
									</tr> ';
							}

						}
					}else{
						echo
						"<tr>
							<td>No Data Yet</td>
							<td>No Data Yet</td>
							<td>No Data Yet</td>
							<td>No Data Yet</td>
						</tr>";
					}
				}
				function filterTable($sq)
				{
    				$con= mysqli_connect("localhost", "root","","tts_db");
    				$filter_Result = mysqli_query($con, $sq);
    				return $filter_Result;
				}
			?>
				
		</table>
		<p class="ticketsales">Total Sales : P 
		<?php
			$sqli="SELECT * FROM cust_tbl where play_id='$req' && cust_status=0 limit ".$r['play_ticket']."";
			$querys=mysqli_query($conn,$sqli);
			$nums =mysqli_num_rows($querys);
			$sum= $num-$nums;
			echo $sum*$r['play_price'];
		?>
		</p>
		<br><br><br><br><br><br>
	<?php 
		if($num<$r['play_ticket']){ ?>
		<p class="add" align="center">Add New Customer	</p>
		<table>
			<tr>
				<form method="POST" class="example">
					<div class="input-group">
		  		<div class="input-group-append">
					<td>	<input type="text" placeholder="New Customer" name="addcust" id="custSearch" autocomplete="off" required>		 		  		</td>
					<td>	<label class="container">Paid
											<input name="paid"type="checkbox" >
											<span class="checkmark"></span>
											</label>
						 		  		</td>
					<td>	<button  name= "add" type="submit">Add
						
							</button></td>
						</div></div>
				</form>
				<?php
							
							if(isset($_POST["add"])){
  								if(!empty($_POST["paid"])){
  									$paid=1;
  								}else{
  									$paid=0;
  								}	
  								$new = $_POST["addcust"];
  								$date = date("Y-m-d");
  								$counter=$r['play_start']+$num;
  								$no= $counter;
  								$reg= " INSERT into cust_tbl(cust_count,cust_name,cust_date,cust_status,play_id) values ('$no', '$new','$date','$paid',$req)";	
								mysqli_query($conn, $reg);
								echo  "<script>window.location.href='play.php?request=".$_GET['request']."'</script>
								";

							}

						?>
			</tr>
		</table>
	<?php }else{
		echo "<p class='add'align='center'>Tickets Sold Out	</p>";
	} ?>

</body>

</html>
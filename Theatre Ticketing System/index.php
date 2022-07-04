<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/index.css">
		<title>Get To PC</title>
	</head>

	<body>
		<p class="title">Get To PC</p>
		<h2>Log in</h2>
		<div id="login">
			<form action="login.php" method="post">
				<div class="username">
				   	<input type="text" placeholder="Enter Username" id="uname" name="username" required>
			    </div>
			    <div class="password">
				    <input type="password" placeholder="Enter Password" id="pword" name="password" required>
	        	</div>
	        	<div>
	    			<input type="submit" name="Log in" id="btn">
	    		</div>
			</form>
		</div>

		<script type="text/javascript" src="js/index.js"></script>
	</body>
</html>
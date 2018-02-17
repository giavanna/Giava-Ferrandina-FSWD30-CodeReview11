<!DOCTYPE html>
<html>
	<head>
		<title>Our-Cars</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>   
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="./css/car_list.css">
	</head>

	<body>
		<container class="row">
			<div id="mynav" class="container">
          <ul class="nav nav-tabs">
              <li  id="myNav"><a href="index.php">Home</a></li>
              <li  id="myNav"><a href="cars_list.php">Our Cars</a></li>
              <li  id="myNav"><a href="office_list.php">Our Offices</a></li>
              <li  id="myNav"><a href="cars_locations.php">Cars Locations</a></li>
          </ul>
        
			<img class="img-top" src="img/am-i-in-love.jpg">
			</div>
		</container>
		<h1 class="h1-office">Our Offices</h1>
		

		<?php
			$servername ="localhost";
			$username = "root";
			$password = "";
			$dbname = "cr11_giava_ferrandina_php_car_rental";

			$mysqli = mysqli_connect($servername, $username, $password, $dbname);
			if (!$mysqli) {
	       		echo "DB connection failed!!!";
	    	}

			$sql = "SELECT o.office_address
					FROM office o
					";
			
			$result = $mysqli->query($sql);
			if (!$result) {
	       		echo "SQL query failed!!!";
	    	}
	    	
			$rows = $result->fetch_all(MYSQLI_ASSOC);
		?>
		<div class="container">
		<div class="row">
			<table class="table table-hover">
				<thead>
				 	<tr>
					  	<th>Office_address</th>   
				  	</tr>
				</thead>
				<tbody>

				<?php
					foreach ($rows as $row) {
						echo "<tr>";
						echo "<td><u>".$row['office_address']."</u></td>";
						echo "</tr>";
					};
				?>

				</tbody>
			</table>
		</div>
	</div>

		<hr>
		<footer>
	      <p>Giava Ferrandina<br>Copyright &copy 2018. All rights reserved.</p>
	    </footer>

	</body>
</html>

<?php ob_end_flush(); ?>
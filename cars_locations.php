

<!DOCTYPE html>
<html>
	<head>
		<title>Our-Cars</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>   
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlMrtstz9Z_-ZDeG7RKAGA2a8mvcPSbxo"></script>
		<link rel="stylesheet" href="./css/car_list.css">

		

		<script type="text/javascript">

			function geocodeLatLng(latitude, longitude, div) {

				var geocoder = new google.maps.Geocoder;
		        var latlng = {lat: parseFloat(latitude), lng: parseFloat(longitude)};

		        geocoder.geocode({'location': latlng}, function(results, status) {
		          if (status === 'OK') {
		            if (results[1]) {
		            	div.html(results[1].formatted_address);
		            } else {
		              div.html("Address not found");
		            }
		          } else {
		            div.html('Geocoder failed due to: ' + status);
		          }
		        });
		     }

			$(document).ready(function() {
				$(".address").each(function(i, e) {
					var latitude = $(this).children('[name="latitude"]').val();
					var longitude = $(this).children('[name="longitude"]').val();

					geocodeLatLng(latitude, longitude, $(this));
				});
			});
		</script>

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
	
		<h1 class="h1-car">Cars locations</h1>
		

		<?php
			$servername ="localhost";
			$username = "root";
			$password = "";
			$dbname = "cr11_giava_ferrandina_php_car_rental";

			$mysqli = mysqli_connect($servername, $username, $password, $dbname);
			if (!$mysqli) {
	       		echo "DB connection failed!!!";
	    	}

			$sql = "SELECT c.car_id, c.car_model, c.car_img, g.gps_latitude, g.gps_longitude
					FROM car c INNER JOIN gps_location g ON c.car_id = g.fk_car_id";
			
			$result = $mysqli->query($sql);
			if (!$result) {
	       		echo "SQL query failed!!!";
	    	}
	    	
			$rows = $result->fetch_all(MYSQLI_ASSOC);
		?>

		<div class="row">
			<table class="table table-hover">
				<thead>
				 	<tr>
					  	<th>Image</th>
					  	<th>Model</th>
					  	<th>Location</th>    
				  	</tr>
				</thead>
				<tbody>

				<?php
					foreach ($rows as $row) {
						echo "<tr>";
						echo "<td>
								<img src='http://localhost/Giava-Ferrandina-FSWD30-CodeReview11/img/".$row['car_img']."'>
							</td>";
						echo "<td><u>".$row['car_model']."</u></td>";
						echo '<td>
								<div class="address">
									<input type="hidden" name="latitude" value="'.$row['gps_latitude'].'">
									<input type="hidden" name="longitude" value="'.$row['gps_longitude'].'">
								</div>
							</td>';
						echo "</tr>";
					};
				?>

				</tbody>
			</table>
			<hr>
		</div>
		<footer>
	        <p>Giava Ferrandina<br>Copyright &copy 2018. All rights reserved.</p>
	    </footer>

	</body>
</html>

<?php ob_end_flush(); ?>
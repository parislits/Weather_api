<?php 
	include ("json_handler.php");
	ini_set("allow_url_fopen", 1);
	
	//There is an error when the api does not return anything
	error_reporting(0);
	ini_set('display_errors', 0);
	
		if (isset($_POST["city_name"])){
			
			$json = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$_POST["city_name"]."&appid=[key]&mode=json&units=metric");
			
			//When the city doesnt exist then the $json is a boolean and not a string that we want to parse.
			if(!is_bool($json)) {
			$json_handler = new json_handler($json);
			}
			else{
				//create the object json_handler just for the if condition 'if(!is_null($json_handler->get_City()))'
				$json_handler = new json_handler(null);
				$Wrong_city = "Please enter a valid city" ;
			}
			
		
		}
			
?>

<html> 
	<head> 
	<meta charset="utf-8">

    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
	
	<title>WeatherApi</title>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>	
	<!--My css file-->
	<link rel="stylesheet" href="styles.css">
	
	</head>
	<body>
	<div class="container" >
	<h1 id="menu" class="center">WeatherApi</h1>
	<div id="weather" class="row">
		<!-- Enter City -->
		<div class="col-sm-6" >
	
			<form onsubmit="get_weather()" method="post">
				<div id ="form_menu">
					
					<input type="text" placeholder="City Name" name="city_name" >
					
					<button type="submit" value="Submit">Search</button>
					<br>
					
				</div>
			</form> 
		</div> 
		
		<!--Show The Weather -->
		<?php  if(isset($_POST["city_name"])){
					if(!is_null($json_handler->get_City())){
						include("weather_menu.php");
						}
					else{
						echo "<h3 id=wrong_weather_menu >" . $Wrong_city . "</h3>";
					}
		} 
		?>
		
		<br/>

	</div>
	</div>
	
	
	</body>

</html>

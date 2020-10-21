
<div class="col-sm-6" > 
			<div id="weather_menu">
			<div id="components">
			<span class="country"> Current weather in <?php echo $json_handler->get_City() ."  ,  " . $json_handler->get_Country(); ?> </span>
			<br>
			<span class="center"><?php echo $json_handler->get_Date(); ?></span>
			<br>
			<img  src=http://openweathermap.org/img/wn/<?php echo $json_handler->get_Icon(); ?>@2x.png alt="Weather_Icon">
			<h3><?php echo $json_handler->get_Temperature() ."    " . "&#8451" ; ?>;</h3>	
			<br>
			<h5> <?php  echo $json_handler->get_Description(); ?></h5>
			</div>
			</div>
		</div> 
<?php

class Json_Handler{
	public $json;
	public $Country;
	public $City;
	public $Date;
	public $Temperature;
	public $Icon;
	
	function __construct($json) {
		if(is_null($json)){
			
			$Country = null;
			$City =null ;
			$Date=null;
			$Temperature=null;
			$Icon=null;
		}
		else{
		$json = json_decode($json);

		foreach ($json->weather as $weather)
		{
			$Description = $weather->description;
			$Icon = $weather->icon;
		}
		$Temperature = $json->main->temp;
			
			
		$Country = $json->sys->country;		
			
		$City = $json->name;
			
		$Time = $json->dt;

		$Date = date("Y-m-d H:i:s", (int)$Time);
			
		$this->Description = $Description;
		$this->Country = $Country;
		$this->City = $City;
		$this->Date = $Date;
		$this->Temperature = $Temperature;
		$this->Icon =$Icon;
		}
  }
	
	function get_Description() {
		return $this->Description;
  }
  	
	function get_Icon(){
		return $this->Icon;
	}
	
	function get_Country() {
		return $this->Country;
  }
  
	function get_City() {
		return $this->City;
  }
  
	function get_Date() {
		return $this->Date;
  }
  
	function get_Temperature() {
		return $this->Temperature;
  }
  

	
}

?>
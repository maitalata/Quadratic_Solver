<?php
$db = new mysqli("localhost","root","123","math");

class data_handling{
		
	public function check_values(){
		$args = func_get_args();
		
		if(empty($args))
			return false;
			
		foreach($args as $arg){
			if(empty($arg))
			{
				return false;
			}
		}
		return true;
	}
	
	public function validate($value)
	{
		 $value = trim($value);
		 $value = stripslashes($value);
		 $value = htmlspecialchars($value);
		 return $value;
	}
}
?>
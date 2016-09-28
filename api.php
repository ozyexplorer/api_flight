<?php 
	function login(){

		$missingParameters = array();
		if (!isset($_POST['username'])) {
			array_push($missingParameters, 'username');
		}
		if (!isset($_POST['password'])) {
			array_push($missingParameters, 'password');
		}
		//kalau error
		if(count($missingParameters) > 0){
			reportMissingParameters([$missingParameters]);
		}
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		//cek ke database
	

		Flight::json(array(
			"code"=>0,
			"message"=>"Succeed",
			"data"=>array(
				"username"=>$username,
				"password"=>$password,
				)
			));
	}

	function reportMissingParameters($missingParameters){
		$parameters = implode(", ", $missingParameters);
		Flight::json(array(
			"code"=>1,
			"message"=>"Missing parameter: ".$parameters.".",
			"data"=>null 
		));				
		exit();
	}

?>
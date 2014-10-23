<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

/**
			'nick'			:nick,
			'name'			:name,
			'surname'		:surname,
			'birth'			:birth,
			'address'		:address,
			'city'			:city,
			'zip'			:zip,
			'country'		:country,
			'email'			:email,
			'jabber'		:jabber,
			'how'			:how,
			'notes'			:notes,
			'distribution'	:distribution,
			'location'		:location,
			'currency'		:currency
**/
if ($_POST) {
	$errors = array();
	if (strlen($_POST['nick']) < 3) {
		$errors[] = 'nick';
	}
	
	if (strlen($_POST['name']) < 3) {
		$errors[] = 'name';
	}
	
	if (strlen($_POST['surname']) < 3) {
		$errors[] = 'surname';
	}
	
	if (strlen($_POST['birth']) < 3) {
		$errors[] = 'birth';
	}
	
	if (strlen($_POST['address']) < 3) {
		$errors[] = 'address';
	}
	
	if (strlen($_POST['city']) < 3) {
		$errors[] = 'city';
	}
	
	if (strlen($_POST['zip']) < 5) {
		$errors[] = 'zip';
	}
	
	if (strlen($_POST['country']) < 3) {
		$errors[] = 'country';
	}
	
	if (strlen($_POST['email']) < 3) {
		$errors[] = 'email';
	}
	
	if (strlen($_POST['jabber']) < 3) {
		$errors[] = 'jabber';
	}
	
	if (!isset($_POST['distribution'])) {
		$errors[] = 'distribution';
	}
	
	if (!isset($_POST['location'])) {
		$errors[] = 'location';
	}	
	
	if (!isset($_POST['currency'])) {
		$errors[] = 'currency';
	}		
	
	echo json_encode($errors);
}
?>
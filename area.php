<?php 
	session_start();
	echo "
		<!DOCTYPE html>
		<html lang='en'>
		<head>
			<meta charset='UTF-8'>
			<meta name='viewport' content='width=device-width, initial-scale=1.0'>
			<title>Личный кабинет</title>
		</head>
		<body background='page.html'>
	";
	$id = $_SESSION["id"];
	$db=new PDO('sqlite:database.sqlite3');	
	$result = $db->query("SELECT * FROM solutions WHERE user_id=$id");
	$elem = [];	
	while ($cur = $result->fetchObject()) {
		$elem[] = $cur;
	}
	for ($i = 0; $i < count($elem); $i++) { 
		echo '<span>Уравнение: '.$elem[$i]->equation.' Корни: '.$elem[$i]->roots.' Дата: '.$elem[$i]->day.'</span><br>';
	}
	echo "			
		</body>
		</html>
	";
?>

<?php
	session_start();
	$db=new PDO("sqlite:database.sqlite3");
	$login=$_POST["login"];	
	$password=$_POST["password"];
	$h=sha1($password."HU$#9OLf%");
	$result = $db->query("SELECT * FROM users WHERE login='$login'");
	$elem = [];	
	while ($cur = $result->fetchObject()) {
		$elem[] = $cur;
	}
	if($elem[0]->password == $h){
		$_SESSION["id"] = $elem[0]->id;
    	header("Location: index.php");
	} else{
		header("Location: check.html");
	}
?>

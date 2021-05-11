<?php 
	$db=new PDO("sqlite:database.sqlite3");
	$login=$_POST["login"];	
	$password=$_POST["password"];
	$h=sha1($password."HU$#9OLf%");
	$db->query ("INSERT INTO users(login, password) VALUES ('$login', '$h')");
	header("Location: index.php");
?>

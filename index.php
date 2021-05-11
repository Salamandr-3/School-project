<?php	
	session_start();
	echo '
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<link rel="stylesheet" type="text/css" href="style.css">
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Подбор корней по теореме Безу</title>
			<style>
			span {
			border : solid 3px #e6f4fd;
			background-color:white;
			}
			</style>
		</head>
		<body>
			<h1 class="h1">Подбор корней по теореме Безу.</h1>
			<div class="bt">
				<h2 class="h2">Введите степень уравнения:</h2>
				<input class="b" type="number" name="cnt" id="cnt">
			</div>
			<form action="solutions.php" method="post">
				<div class="factor">	
				</div>
				<center>
					<button class="but" type="submit">Решить</button>
				</center>
			</form>
			<br>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
			<script src="file.js"></script>
	';
	if (isset($_SESSION["id"])) {
		echo '
			<div class="reg_1">
				<a href="area.php"><button class="but">Личный кабинет</button></a>
			</div>
		';
	} else {
		echo '
			<div class="reg">
				<a href="check.html"><button class="but">Войти</button></a>
				<a href="add.html"><button class="butt">Зарегестрироваться</button></a> <br>
			</div>
		';
	}
	if (isset($_SESSION["roots"])) {
		$roots = $_SESSION["roots"];
		echo '<center><span>'.$roots.'</span></center>';
	}
	echo '
		</body>
		</html>
	';
?>

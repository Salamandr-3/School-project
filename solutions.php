<?php
	session_start();
	date_default_timezone_set("UTC");
    $k = array();
    $i = 0;
    while (isset($_POST[strval($i)])) {
        array_push($k, $_POST[strval($i)]);
        $i++;
    }
	$divisor = array();
	for ($i = 1; $i * $i <= abs($k[0]); $i++) {
        if ($k[0] % $i == 0) {
            array_push($divisor, $i);
            array_push($divisor, -$i);
            array_push($divisor, $k[0] / $i);
            array_push($divisor, -$k[0] / $i);
        }
    }
    $ans = "";
    for ($j = 0; $j < count($divisor); $j++) {
    	$d = $divisor[$j];
    	$sum = 0;
    	for ($i = count($k) - 1; $i > 0; $i--) { 
    		$t = $d;
            $s = $t;
            for ($c = 1; $c < $i; $c++) {
                $s *= $t;
            }
            $sum += $s * $k[$i];
    	}    	
    	$sum += $k[0];
        if ($sum == 0) {
        	$ans .= strval($d).", ";
        }
    }
    $ans = mb_substr($ans, 0, -2);
    $db = new PDO("sqlite:database.sqlite3");
    $equation = strval($k[0]);
    for ($i = 1; $i < count($k); $i++) {
    	if ($k[$i] < 0) {
    		$equation .= strval($k[$i])."x^".strval($i);
    	} else {
    		$equation .= "+".strval($k[$i])."x^".strval($i);    		
    	}
    }
    $day = date('l jS \of F Y h:i:s A');
    if (isset($_SESSION["id"])) {
    	$id = $_SESSION["id"];
   		$db->query("INSERT INTO solutions (user_id, equation, roots, day) VALUES ($id, '$equation', '$ans', '$day')");
   	}
    $_SESSION["roots"] = $ans;
    header("Location: index.php");
?>

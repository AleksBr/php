<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>time</title>
</head>
<body>
<div>
	<?php 
	// http://project260218.tilda.ws/lecture8
	/* 01 */
	$nowDay = time();
	
	$newYear = strtotime('2018-01-01');

	$endSummer = strtotime('2017-09-01');

	$nextMond = strtotime("next Monday");

	echo floor(($newYear - $nowDay) / 60) . " минут до конца года<br>";

	echo $endSummer - $nowDay . " секунд до конца лета<br>";

	echo round(($nextMond - $nowDay) / 3600, 2) . " часов до следующего понедельника<br>";

	/* 02 */
	
	$startP = strtotime('2010-02-25');
	$endP = strtotime('2014-02-22');
	echo $endP - $startP;
	echo "<br>";

	/* 03 
		Необходимо написать функцию (будет в качестве аргумента принимать год) и подсчитывать 
		количество понедельников, на которые выпало 21 июня, за 10 лет до соответствующего года
	*/
	?>
	<form method="get">
		<input type="text" name="year" placeholder="введите год ХХХХ">
		<input type="submit">
	</form>
	<?php

	if( isset($_GET['year']) ){
		$yearUser = trim($_GET['year']);
		echo "Результат: ";
		getMonday( $yearUser );
	}

	function getMonday($year){
		if( $year < 1970 || $year > 2050 ){
			echo "неверно";
		} else {
			$minYear = $year - 10;
			$arrMon = [];
			for ($i = 0; $i < 10; $i++) {
				$timestamp = mktime(0, 0, 0, 1, 21, $year)
			}
		}
		
	}


	 ?>
</body>
</html>

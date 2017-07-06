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
	echo "<hr>";

	/* 02 */
	
	$startP = strtotime('2010-02-25');
	$endP = strtotime('2014-02-22');
	echo $endP - $startP;
	echo "<br>";
	echo "<hr>";

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
		if(empty($year)){
			echo "Пусто";
		} else if( $year < 1970 || $year > 2050 ){
			echo "неверно";
		} else {
			$minYear = $year - 10;
			$timestamp = strtotime("$minYear-06-21");

			for ($i = 0; $i < 10; $i++) {				
				if (date('w', $timestamp) == 1) {
					echo "есть в $minYear году<br>";
				} else {
					echo "нема в $minYear году<br>";
				}
				$minYear++;
			}
		}
		
	}

	// 4. Необходимо написать функцию, которая будет в качестве значения принимать год и определять в какой день недели в этом году у вас день рождения

	// 5. Определите количество високосных годов, которые вы прожили за жизнь

	// 6. Необходимо написать функцию, которая будет принимать в качестве аргумента время в часах и минутах и возвращать массив, состоящий из двух значений - разница во времени с Нью-Йорком и разница во времени с Токио

	// 7. Необходимо написать функцию (в качестве аргумента принимает год), которая будет определять количество 13 пятниц в году
	 ?>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>time</title>
	<style>
		span{
			color:  red;
		}
	</style>
</head>
<body>
<div>
	<?php 
	// http://project260218.tilda.ws/lecture8
	/* 01 */
	$nowDay = time();
	
	$newYear = strtotime('01-01-2018');

	$endSummer = strtotime('01-09-2017');

	$nextMond = strtotime("next Monday");

	echo floor(($newYear - $nowDay) / 60) . " минут до конца года<br>";

	echo $endSummer - $nowDay . " секунд до конца лета<br>";

	echo round(($nextMond - $nowDay) / 3600, 2) . " часов до следующего понедельника<br>";
	echo "<hr>";

	/* 02 */
	
	$startP = strtotime('25-02-2010');
	$endP = strtotime('22-02-2014');
	echo $endP - $startP;  // 125971200
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
			
			for ($i = 0; $i < 10; $i++) {	
				$dayD = strtotime("21-06-$minYear");			
				if (date('w', $dayD) == 1) {
					echo "есть в $minYear году<br>";
				} else {
					echo "нема в $minYear году<br>";
				}
				$minYear++;
			}
		}		
	}
	echo "<hr>";

	// 4. Необходимо написать функцию, которая будет в качестве значения принимать год и определять в какой день недели в этом году у вас день рождения
?>
	<form method="get">
		<input type="text" name="birth" placeholder="введите год ХХХХ">
		<input type="submit">
	</form>
<?php
	if( isset($_GET['birth']) ){
		$birthUser = trim($_GET['birth']);
		echo "Результат: ";
		getBirth( $birthUser );
	}

	function getBirth($year){
		$dayU = strtotime("28-11-$year");
		echo date("l", $dayU);
	}
	echo "<hr>";
	// 5. Определите количество високосных годов, которые вы прожили за жизнь

	$birthDay = 1986;
	$toDay = date("Y", time());
	$yearU = $toDay - $birthDay;
	$countL = 0;

	for ($i = 0; $i < $yearU; $i++) {		
		if(date("L", strtotime("28-11-$birthDay")/*mktime(0,0,0,1,1, $birthDay)*/)){
			$countL++;
			//echo "Высокосный год $birthDay<br>";
		}
		$birthDay++;		
	}
	echo "Всего $countL високосных годов";
	echo "<hr>";

	// 6. Необходимо написать функцию, которая будет принимать в качестве аргумента время в часах и минутах и возвращать массив, состоящий из двух значений - разница во времени с Нью-Йорком и разница во времени с Токио
	// Asia/Tokyo
	// America/New_York
	function timeMy($h, $i){
		$y = date("Y");
		$asia = new DateTime('Asia/Tokyo');
		$amer = new DateTime('America/New_York');
		$euro = new DateTime();
		$euro->setTime($h, $i);
		$euroH = $euro->format('H-i');
		$asiaH = $asia->format('H-i');
		$amerH = $amer->format('H-i');
		echo $asiaH . "<br>";
		echo $amerH;
		$different = date_diff($euroH, $asiaH); 
		echo $different->format('H');
	}


	timeMy(12, 24);
	echo "<hr>";
	// 7. Необходимо написать функцию (в качестве аргумента принимает год), которая будет определять количество 13 пятниц в году

	function myFriday( $year ){
		$allF = 0;			
		for ($i = 1; $i <= 12; $i++) {	
			$dayF = strtotime("13-$i-$year");			
			if (date('w', $dayF) == 5) {
				echo "есть в $i месяце<br>";
				$allF++;
			}
		}
		echo "всего <span>$allF</span> пятницы 13";
	}
	myFriday( 2017 );
?>
</body>
</html>

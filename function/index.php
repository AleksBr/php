<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>function</title>
</head>
<body>
<small>1 - окончание в зависимости от количества</small>
<form method="get"><input type="text" name="number" placeholder="Введите число"><input type="submit"></form>
<?php
	//	http://project260218.tilda.ws/lecture6
	mb_internal_encoding("UTF-8");
	// setlocale(LC_ALL, 'ru_RU.UTF-8');
	/*
		1. Необходимо вывести на экран строку с количеством товаров следующего вида: "N товаров", 
	где N - количество товаров. Нужно написать функцию, которая будет формировать строку с выводом 
	в правильном склонении в зависимости от числа.
	*/
	if( isset($_GET['number']) ){
		$numberUser = trim($_GET['number']);
		echo "Результат: ";
		getNumber( $numberUser );
	}
	function getNumber($num){
		if (!is_numeric($num)){
			echo "Введите число";
		} else {
			if ($num <= 0){
				echo "Товаров нет";
			} elseif ( $num >= 201 ){
				echo "Слишком много выбрано";
			} elseif ( ($num == 1 ||  $num % 10 == 1) && ($num != 11 && $num != 111) ){
				echo "$num товар";
			} elseif ( ($num == 2 ||  $num == 3 || $num == 4 || $num % 10 == 2 || $num % 10 == 3 || $num % 10 == 4) &&
						($num != 12 && $num != 13 && $num != 14 && $num != 112 && $num != 113 && $num != 114) ){
				echo "$num товара";
			} else {
				echo "$num товаров";
			}			
		}
	}

?>
<hr>
<small>2 - принимать строку и переворачивать её (делать зеркальной)</small>
<form method="get"><input type="text" name="revStr" value="<?php if(isset($_GET['revStr'])){ echo $_GET['revStr'];} ?>" placeholder="Введите строку"><input type="submit"></form>
<?php 
	/*
		2. Необходимо написать функцию, которая будет в аргументе принимать строку и переворачивать её (делать зеркальной) 
	и возвращать полученный результат. При этом нельзя использовать стандартную функцию PHP strrev.
	*/

	if( isset($_GET['revStr']) ){
		$stringUser = trim($_GET['revStr']);
		echo "Результат: ";
		getRevStr( $stringUser );
	}
	function getRevStr( $str ){
		if(empty($str)){
			echo "Пусто";
		} else {
			$strTmp = '';
			$strRev = '';
			$strLen = mb_strlen($str);
			for ($i = $strLen-1; $i >= 0; $i--) {
				$strTmp[] = $str[$i];
			}
			$strRev = implode("", $strTmp);
			echo "$strRev";	
		}				
	}
?>
<hr>
<small>3 - Необходимо написать функцию, которая будет работать аналогично функции PHP array_unique</small>
<br>
<?php 
	/*
		3 - Необходимо написать функцию, которая будет работать аналогично функции PHP array_unique
		array_unique - Убирает повторяющиеся значения из массива
	*/

	$arrNoUn = ['Monday', 'Monday', 'Tuesday', 'Tuesday', 'hi', 'Wednesday', 'Thursday', 'Friday', 'Tuesday', 'Monday'];

	$arrRu = ['два', 'три', 'три', 'пять', 'шесть', 'три', 'один'];
	
	echo "С повторениями: ";
	foreach ($arrNoUn as $val) {
		echo $val . " ";
	}
	echo "<br>";
	echo "С повторениями: ";
	foreach ($arrRu as $val) {
		echo $val . " ";
	}
	echo "<br>";

	function myArrUniq( $arr ){
		$arrLeng = count($arr);
		$arrSort = [];

		for ($i = 0; $i < $arrLeng; $i++) {			
			if ( isset($arr[$i]) ){
				for ($j = $i + 1; $j < $arrLeng; $j++) {
					if( isset($arr[$j]) && ($arr[$i] === $arr[$j]) ){
						unset($arr[$j]);					
					} 
				}
				$arrSort[] = $arr[$i];
			}
			
		}
		echo "Без повторений: ";
		foreach ($arrSort as $val) {
			echo $val . " ";
		}
		echo "<br>";
	}

	myArrUniq( $arrNoUn );
	myArrUniq( $arrRu );
?>
<hr>
<small>4 - Необходимо написать функцию, которая будет работать аналогично функции PHP array_chunk</small>
<?php 
	/*
		4. Необходимо написать функцию, которая будет работать аналогично функции PHP array_chunk
		array_chunk — Разбивает массив на части
	*/
	$arrNumChuk = ['один', 'два', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'];

	echo "<br>массив: ";
	foreach ($arrNumChuk as $val) {
		echo $val . " ";
	}
	echo "<br>";
	function myArrChun( $arr, $parts ){
		$arrLeng = count($arr);
		$arrChun = [];
		$tmp = 0;

		for ($i = 0; $i < $arrLeng; $i++) {
			if(isset( $arr[$i]) ){
				for ($j = 0; $j < $parts; $j++) {
					if(isset( $arr[$tmp]) ){
						$arrChun[$i][] = $arr[$tmp];
						$tmp++;
					}
				}
			}
		}

		echo "Разбитый на $parts частей: <br>";
		foreach ($arrChun as /*$val =>*/ $key) {
			foreach ($key as $v => $k) {
				echo $v . " " . $k . " ";
			}
			echo "<br>";
		}
		echo "<br>";
		echo "<pre>";
		var_dump($arrChun);
		echo "</pre>";
	}

	myArrChun($arrNumChuk, 2);
?>
<hr>
<small>5 - Необходимо написать функцию, которая будет работать аналогично функции PHP array_diff</small>

<hr>
<small>6 - преобразовывает Фамилия Имя Отчество в краткую запись Фамилия И.О.</small>
<form method="get"><input type="text" name="nameUser" placeholder="Введите ФИО полностью"><input type="submit"></form>
<?php 
	/*
		Необходимо написать функцию, которая будет преобразовывать строку Фамилия Имя Отчество в краткую запись Фамилия И.О.
	*/
	if(isset($_GET['nameUser'])){
		$nameUser = trim($_GET['nameUser']);
		echo "Результат: ";
		getNameUsr( $nameUser );
	}
	function getNameUsr($name){
		$arrayName = explode(" ", $name);
		foreach ($arrayName as $key => $value):
			if(!preg_match('/[^A-Za-z]/', $value)){
				if($key == 0){
					echo ucfirst($value) . " ";
				} else {
					echo mb_strtoupper($value[0]) . ". ";
				}			
			} else {
				if($key == 0){
					echo mb_strtoupper(mb_substr($value, 0, 1)) . mb_substr($value, 1) . " ";
				} else {
					echo mb_strtoupper(mb_substr($value, 0, 1)) . ". ";
				}
			}		
		endforeach;		
	}	
?>
<hr>
<small>7 - определять мобильного оператора, исходя из полученного номера телефона</small>
<form method="get">
	<input style="width:400px" type="text" name="phoneUser" placeholder="Введите номер телефона в формате +XXXXXXXXXXX">
	<input type="submit">
</form>
<?php 
	/*
		7. Необходимо написать функцию, которая будет определять мобильного оператора, исходя из полученного номера телефона
	*/
	if(isset($_GET['phoneUser'])){
		$phoneUser = trim($_GET['phoneUser']);
		echo "Ваш номер: $phoneUser <br>";
		echo "Оператор: ";
		getPhoneUsr( $phoneUser );
	}
	function getPhoneUsr( $phone ){
		if (!is_numeric($phone)){
			echo "Введите номер";
		} else if ( !preg_match('/[0-9]{13}$/', $phone) ) {

			$mobOper = [
				'Киевстар'	=> '+38097',
				'Vodafone'	=> '+38099',
				'Lifecell'	=> '+38093',
			];
			$mobPart = mb_substr($phone, 0, 6);
			$mobRes = array_search($mobPart, $mobOper);
			echo $mobRes;
		} else {
			echo "неверный формат";
		}
	}
?>

</body>
</html>
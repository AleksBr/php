<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>function</title>
</head>
<body>
<form method="get"><input type="text" name="number" placeholder="Введите число"><input type="submit"></form>
<?php
	//	http://project260218.tilda.ws/lecture6
	mb_internal_encoding("UTF-8");
	// setlocale(LC_ALL, 'ru_RU.UTF-8');
	/*
		Необходимо вывести на экран строку с количеством товаров следующего вида: "N товаров", 
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
<form method="get"><input type="text" name="revStr" value="<?php echo $_GET['revStr']; ?>" placeholder="Введите строку"><input type="submit"></form>
<?php 
	/*
		Необходимо написать функцию, которая будет в аргументе принимать строку и переворачивать её (делать зеркальной) 
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

</body>
</html>
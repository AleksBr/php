<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>String</title>
</head>
<body>
<a href="http://project260218.tilda.ws/lecture3">строки</a>
<?php
	$myString = "<p>в том же 1990 году стартовал первый телесериал Линча — Твин Пикс. В основе сюжета сериала — расследование загадочного убийства школьницы Лоры Палмер, произошедшего в небольшом американском городке Твин Пикс. Сериал пользовался поначалу большим успехом, но уже через год съёмки были свёрнуты из-за низких рейтингов. Тем не менее сериал стал знаковым культурным явлением начала 1990-х. Ежегодно под Сиэтлом проходит слёт поклонников Твин Пикса</p>";

	/* 01 посчитать количество повторений в строке выражения Твин Пикс */

	/* 2) заменить в строке Твин Пикс на Twin Peaks */
		echo "-2-";
		echo "<br>";
		$engStr = "Twin Peaks";
		$rusStr = "Твин Пикс";
		echo str_replace($rusStr, $engStr, $myString);
		echo "<br>";

	/* 3) посчитать количество символов в строке */
		echo "-3-";
		echo "<br>";
		$myLength = strlen(utf8_decode($myString));
		echo $myLength; // 448
		echo "<br>";

	/* 4) посчитать количество символов без пробелов в строке */
		echo "-4-";
		echo "<br>";
		$myLengthSp = strlen(utf8_decode(str_replace(" ", "", $myString)));
		echo $myLengthSp; // 386
		echo "<br>";

	/* 5) убрать html-теги (<p>) в строке */
		echo "-5-";
		echo "<br>";
		$noTags = strip_tags($myString);
		echo $noTags;
		echo "<br>";

	/* 6) вывести строку в браузере как html-код */
		echo "-6-";
		echo "<br>";
		$myHtmlA = htmlentities($myString);
		echo $myHtmlA;
		echo "<br>";

	/* 7) первое слово "В" в начале тексте должно быть с большой буквы */
		echo "-7-";
		echo "<br>";
		echo mb_strtoupper(mb_substr($noTags, 0, 1)) . mb_substr($noTags, 1);
		//echo $firstBig;
		echo "<br>";

?>
</body>
</html>

<form method="get">
	<input style="width:600px" type="text" name="way" placeholder="Введите путь"><input type="submit">
</form>
<?php 

	// http://project260218.tilda.ws/lecture7
	
	// 01 

	if( isset($_GET['way']) ){
		$wayUser = trim($_GET['way']);
		echo "Результат: ";
		getScan( $wayUser );
	}

	function getScan( $way ){
		echo $way;
	}
?>


<form method="post">
	<input style="width:600px" type="text" name="img" placeholder="Введите путь к изображению"><input type="submit">
</form>
<?php 

	/* 3. Необходимо написать функцию, которая будет в качестве аргумента 
	принимать ссылку на изображение в интернете, и сохранять его на жесткий диск.
	*/

	// http://www.the-dialogue.com/wp-content/uploads/2016/03/ru26-gorod-budushhego_04.jpg

	if( isset($_POST['img']) ){
		$imgUser = trim($_POST['img']);
		echo "Результат: ";
		getImg( $imgUser );
	}

	function getImg( $img ){
		$path_parts = pathinfo( $img );
		$download = "download/";
		$fileName = $download . $path_parts['basename'];
		copy($img, $fileName);
	}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Домашнее задание</title>
</head>	
<body>
<style>

	form {
		width: 400px;
		padding: 10px;
		border: 1px solid;
	}
	
	nav a {
		display: inline-block;
		margin: 20px 40px;
	}

</style>
<nav>
	<a href="./admin.php">admin.php</a>
	<a href="./list.php">list.php</a>
	<a href="./test.php">test.php</a>
</nav>


<form method="post" enctype="multipart/form-data" name="myform">
	<input name="userfile" type="file">
	<input type="submit" value="Отправить файлы ">
</form>

<?php
	
	//Проверяем, был ли файл отправлен
	if(isset($_FILES['userfile'])){
		$file = $_FILES['userfile'];
		$nameFile = $file['name'];
		$file = $_FILES['userfile'];
		
		//Ищем ПОСЛЕДНЕЕ вхождение точки в названии файла, не путать с функцией strpos - которая ищет первое
		$searchTerms = strrpos($nameFile, '.');
		//Вырезаем все что после точки - а именно: формат файл
		$sampleFormat = substr($nameFile, $searchTerms);
		
		$dir    = './test';
		$files = scandir($dir);
		
		//Смотрим есть ли такой файл
		if(!(array_search($nameFile, $files))){
			//Если нету, и при этом его расширение .json - заносим
			if($sampleFormat == ".json"){
			move_uploaded_file($file['tmp_name'], './test/'.$nameFile);
			echo "<span style='color:green;'>Передан!</span>";
			}else{
				echo "<span style='color:red;'>Формат должен быть .json</span>";
			}
			//Если есть, сообщаем об этом
		}else{
			echo "<span style='color:red;'>Такйо файл уже ЕСТЬ</span>";
		}		
	}

?>

</body>
</html>
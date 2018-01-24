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


<?php


//Выводим из папки test список содержимых файлов
$dir    = './test';
$files = scandir($dir);
unset($files[0]);
unset($files[1]);

foreach($files as $key=>$value){		
	echo "<br><a href='./test.php?".$value."'>".$value."</a>";
}

?>


</body>
</html>
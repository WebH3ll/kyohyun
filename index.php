<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<link href="css/navbar.css" rel="stylesheet" />
</head>
<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <? include "./script/navbar.php"; ?>

	<main style="padding:30px;">
    <h1> Hello I'm fine </h1>

	<?php
		ini_set('display_errors', '0');

		if ($_SESSION['isLoginId']) {
			echo "<h2> Welcome, ".$_SESSION['isLoginId']."! </h2>";
		}
		else {
			echo "<h2> Please login first </h2>";
		}
	?>
	</main>

	<? if (isset($_SESSION['isLoginId'])) {
		if (file_exists('./img/'.$_SESSION['isLoginId'].'.jpg')) {
			echo "
				<div style='text-align:center;'>
					<img src='./img/".$_SESSION['isLoginId'].".jpg' style='width:800px; height:suto;'>
				</div>";
		}
		echo "
			<form action='upload.php' method='POST' enctype='multipart/form-data'>
				<input type='file' name='upload'> <input type='submit' class='btn btn-warning' value='Upload'>
			</form>";
	}
	?>

</body>
</html>
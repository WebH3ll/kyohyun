<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Config</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<link href="css/navbar.css" rel="stylesheet" />
	<style>
        table {
            margin-left:auto; 
            margin-right:auto;
        }
    </style>
</head>
<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <? include "./script/navbar.php"; ?>
	<?php
        ini_set('display_errors', '0');
        
        include "./script/dbconnect.php";

        if (!$_SESSION['isLoginId']) {
            echo "<script> alert('Please login first'); location.href='index.php'; </script>";
        }
    ?>


	<?php
		ini_set('display_errors', '0');

		if ($_SESSION['isAdmin']==1) { ?>
			<table width="800" border="1" style="text-align:center;" class="table w-auto">
				<tr>
					<th width="50"> No </th>
					<th width="200"> ID </th>
					<th width="150"> User Name </th>
					<th width="75"> Admin </th>
					<th width="125"> Delete User </th>
				</tr>

				<?php
					$query = "SELECT * FROM user";
					$results = $db->query($query)->fetchAll();

					foreach ($results as $result) {
				?>
				<tr>
					<td> <?=$result['Idx']?> </td>
					<td> <?=$result['Id']?> </td>
					<td> <?=$result['UserName']?> </td>
					<td> <? if ($result['IsAdmin']==1) { echo "Yes"; } else { echo "No"; }?> </td>
					<td> <button type="button" class="btn btn-warning" onclick="location.href='confirmUserDel.php'+'?Idx='+<?=$result['Idx']?>"> Delete </button> </td>
				</tr>
				<?php
					}
				?>
			</table>
		<?php
		}
		else {
			echo "<h2> This is config page(Admin only) </h2>";
		}
	?>
	</main>

</body>
</html>
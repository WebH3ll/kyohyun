<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
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

    <table width="800" border="1" style="text-align:center;" class="table w-auto">
    <tr>
        <th width="50"> No </th>
        <th> Title </th>
        <th width="100"> ID </th>
        <th width="150"> Creation time </th>
        <th width="75"> Secret </th>
    </tr>

    <?php
        $query = "SELECT * FROM memo";
        $results = $db->query($query)->fetchAll();

        foreach ($results as $result) {
    ?>
    <tr>
        <td> <?=$result['Idx']?> </td>
        <td> <a href="view.php?Idx=<?=$result['Idx']?>"><?=$result['Title']?></a> </td>
        <td> <?=$result['Id']?> </td>
        <td> <?=substr($result['Regdate'], 0, 10)?> </td>
        <td> <? if ($result['IsSecret']==1) { echo "Yes"; } else { echo "No"; }?> </td>
    </tr>
    <?php
        }
    ?>

    <tr>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> <button type="button" class="btn btn-warning" style="float:right;" onclick="location.href='write.php'">Write</button> </td>
    </tr>
    </table>
</body>
</html>


<?php
    $db->close();
?>
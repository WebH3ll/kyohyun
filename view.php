<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<link href="css/navbar.css" rel="stylesheet" />
    <style>
        table {
            margin-left:auto; 
            margin-right:auto;
            width:500px;
        }
    </style>
</head>
<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <?php
        include "./script/dbconnect.php";
        include "./script/navbar.php";

        session_start();

        $idx = $_GET['Idx'];

        $query = "SELECT * FROM memo WHERE Idx='$idx'";
        $result = $db->query($query)->fetchArray();

        if ($idx) {
            $query = "SELECT * FROM memo WHERE Idx='$idx'";
            $result = $db->query($query)->fetchArray();
            
            $isSecret = $result['IsSecret'];
            
            if ($isSecret) {
                if ($_SESSION['isAdmin'] == 1) {
                    goto a;
                }
                else if ($_SESSION['isLoginId'] != $result['Id']) {
                    echo "<script>
                        alert('This is secret memo');
                        history.back();
                    </script>";
                    exit;
                }
            }
        }
    ?>

<? a: ?>
    <form action="writePost.php" method="POST">
        <table border="1" class="table w-auto">
            <tr>
                <th style="width:200px;"> ID </th>
                <td style="width:600px;"> <?=$result['Id']?> </td>
            </tr>

            <tr>
            <th> Title </th>
                <td> <?=$result['Title']?> </td>
            </tr>

            <tr>
            <th style="height:200px;"> Memo </th>
                <td>
                    <?=nl2br($result['Memo'])?>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <?php
                        if ($_SESSION['isAdmin']  == 1) goto b;
                        if ($result['Id']==$_SESSION['isLoginId']) {
                            b:
                            echo "
                                <div style='float:right;'>
                                <a href='write.php?Idx=$idx' class='btn btn-warning'> Edit </a>
                                <a href='confirmDel.php?Idx=$idx' class='btn btn-warning'> Delete </a>
                                </div>
                            ";
                        }
                    ?>
                    <a href="list.php" class="btn btn-warning"> List </a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>


<?php
    $db->close();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
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

    <?php
        include "./script/navbar.php";

        $idx = $_GET['Idx'];
    ?>

    <form action="del.php" method="POST">
        <input type="hidden" name="Idx" value="<?=$idx?>">

        <table border="1" width="500" class="table w-auto">
            <tr>
                <th colspan=2> Do you really want to delete post <?=$idx?>? </th>
            </tr>
            <tr>
                <th> Password </th>
                <td> <input type="password" name="Password" placeholder="Password" size="20"> </td>
            </tr>

            <tr>
                <td colspan="2">
                    <div style="text-align:center;">
                        <input type="submit" class="btn btn-warning" value="Delete">
                    </div>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
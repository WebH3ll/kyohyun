<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<link href="css/navbar.css" rel="stylesheet" />
</head>
<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<?php
    include "./script/navbar.php";
    include "./script/dbconnect.php";

    ini_set('display_errors', '0');

    if (isset($_GET['Idx'])) {
        $idx = $_GET['Idx'];

        $query = "SELECT * FROM memo WHERE Idx='$idx'";
        $result = $db->query($query)->fetchArray();
    }
?>

<form action="writePost.php" method="POST" onsubmit="return chkFrm();">
    <input type="hidden" name="Idx" value="<? if (isset($idx)) { echo $idx; }?>">

    <table width="800" border="1">
        <tr>
            <th> ID </th>
            <td> <?=$_SESSION['isLoginId']?> </td>
        </tr>

        <tr>
            <th> Title </th>
            <td> <input type="text" name="Title" id="Title" style="width:100%" value="<? if (isset($result)) {echo $result['Title'];}?>"> </td>
        </tr>

        <tr>
            <th> Memo </th>
            <td>
                <textarea name="Memo" id="Memo" style="width:100%; height:300px;"><? if (isset($result)) {echo $result['Memo'];}?></textarea>
            </td>
        </tr>

        </tr>
            <th> Is Secret? </th>
            <td> <input type="checkbox" name="IsSecret" id="IsSecret" value="0" onclick="IsChecked();" unchecked> </td>
        </tr>

        <tr id="Password">
        </tr>

        <tr>
            <td colspan="2">
                <div style="text-align:center;">
                    <input type="submit" class="btn btn-warning" value="Save">
                </div>
            </td>
        </tr>
    </table>
</form>


<div id='PassForm'>
</div>
</body>
</html>



<script>
    // 빈 공간 체크
    function chkFrm() {
        var title = document.getElementById("Title").value;
        var memo = document.getElementById("Memo").value;
        var isSecret = document.getElementById("IsSecret").value;

        if (title == "") {
            alert("Please enter title");
            document.getElementById("Title").focus();

            return false;
        }
        else if (memo == "") {
            alert("Please enter memo");
            document.getElementById("Memo").focus();

            return false;
        }

        return true;        
    }

    function IsChecked() {
        var checkbox = document.getElementById("IsSecret");

        if (checkbox.checked == 1) {
            document.getElementById("IsSecret").value = 1;
            document.getElementById("Password").innerHTML = "<th> Password </th>"+"<td> <input type='Password' name='MemoPassword' placeholder='Password' size='20'> </td>";
        }
        else {
            document.getElementById("IsSecret").value = 0;
            document.getElementById("Password").innerHTML = "";
        }
    }

</script>


<?php
    $db->close();
?>
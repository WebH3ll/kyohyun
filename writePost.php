<?php
    include "./script/dbconnect.php";

    session_start();

    ini_set('display_errors', '1');

    $id = $_SESSION['isLoginId'];
    $idx = $_POST['Idx'];
    $title = $_POST['Title'];
    $memo = $_POST['Memo'];

    if (isset($_POST['MemoPassword'])) {
        $password = $_POST['MemoPassword'];
    }
    else {
        $password = "";
    }
    if (isset($_POST['IsSecret'])) {
        $isSecret = $_POST['IsSecret'];
    }
    else {
        $isSecret = 0;
    }

    if ($idx) {
        $query = "SELECT * FROM memo WHERE Idx='$idx' and MemoPassword=password('$password')";
        $result = $db->query($query)->fetchArray();

        
        if (!$result['Idx']) {
            echo "<script>
                alert('Wrong Password');
                history.back();
            </script>";
            exit;
        }


        $query = "UPDATE memo set Id='$id', Title='$title', Memo='$memo' where Idx='$idx' ";
        $db->query($query);
    }
    else {
        $regdate = date("Y-m-d H:i:s");

        $query = "INSERT INTO memo(Id, Title, Memo, Regdate, MemoPassword, IsSecret) VALUES('$id', '$title', '$memo', '$regdate', password('$password'), $isSecret) ";
        $db->query($query);
    }
?>

<script>
    location.href="list.php";
</script>


<?php
    $db->close();
?>
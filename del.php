<?php
    include "./script/dbconnect.php";

    session_start();

    ini_set('display_errors', 0);

    $idx = $_POST['Idx'];
    $password = $_POST['Password'];

    if ($_SESSION['isAdmin'] == 1) goto c;

    $query = "SELECT * FROM memo WHERE Idx='$idx' and MemoPassword=password('$password')";
    $result = $db->query($query)->fetchArray();

    if (!$result['Idx']) {
        echo "<script>
            alert('Wrong Password');
            history.back();
        </script>";
        exit;
    }

    c:

    $query = "DELETE FROM memo WHERE Idx='$idx'";
    $db->query($query);
?>

<script>
    location.href="list.php";
</script>


<?php
    $db->close();
?>
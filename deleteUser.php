<?php
    include "./script/dbconnect.php";

    session_start();

    ini_set('display_errors', 0);

    $idx = $_POST['Idx'];

    $query = "DELETE FROM user WHERE Idx='$idx'";
    $db->query($query);
?>

<script>
    location.href="config.php";
</script>


<?php
    $db->close();
?>
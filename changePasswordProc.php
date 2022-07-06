<?php
    session_start();

    ini_set('display_errors', '0');

    include "./script/dbconnect.php";

    // 비밀번호 변경
    $data = array($_POST['Password'], $_SESSION['isLoginId']);
    $query = "UPDATE user SET Password=password(?) WHERE Id=?";
    $db->query($query, $data);

    Header("Location: logout.php");
?>
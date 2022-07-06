<?php
    ini_set('display_errors', '0');

    session_start();

    include "./script/dbconnect.php";

    $id = $_POST['Id'];
    $password = $_POST['Password'];

    $query = "SELECT * FROM user WHERE Id=?";
    $result = $db->query($query, $id)->fetchArray();

    $isAdmin = $result['IsAdmin'];

    if (!$result['Idx']) {
        echo "<script> alert('Member does not exist'); history.back(); </script>";

        exit;
    }

    $q = "SELECT password(?) as Password";
    $tmp = $db->query($q, $password)->fetchArray();

    if($result['Password']!=$tmp['Password']) {
        echo "<script> alert('Wrong password'); history.back(); </script>";

        exit;
    }

    $_SESSION['isLoginId'] = $id;
    $_SESSION['isAdmin'] = $isAdmin;

    $db->close();

    Header("Location: index.php");
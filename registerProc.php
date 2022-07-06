<?php
    ini_set('display_errors', '0');

    include "./script/dbconnect.php";

    // 아이디 중복 체크
    $query = "SELECT * FROM user WHERE Id=?";
    $result = $db->query($query, $_POST['Id'])->fetchArray();

    if ($result['Idx']) {
        echo "<script> alert('Duplicate ID'); history.back(); </script>";

        exit;
    }

    // 유저 등록
    $data = array($_POST['Id'], $_POST['Password'], $_POST['Name']);

    $query = "INSERT INTO user(Id, Password, UserName) VALUES(?, password(?), ?)";
    $db->query($query, $data);

    $db->close();

    Header("Location: index.php");
?>
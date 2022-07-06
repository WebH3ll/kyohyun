<?php
    session_start();

    move_uploaded_file($_FILES['upload']['tmp_name'], "./img/".$_SESSION['isLoginId'].".jpg");

    Header("Location: index.php");
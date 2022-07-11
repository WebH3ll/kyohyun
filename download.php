<?php
    session_start();

    $filename = $_SESSION['isLoginId'].".jpg";
    $file = "./img/".$filename;


    if (is_file($file)) {
        header("Content-type: application/octet-stream");
        header("Content-Length: ".filesize($file));
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Transfer-Encoding: binary");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Pragma: public");
        header("Expires: 0");

        ob_clean();
        flush();
        readfile($file);
    }
    else {
        echo "<script> alert('No file exist'); location.href='index.php'; </script>";
    }
?>
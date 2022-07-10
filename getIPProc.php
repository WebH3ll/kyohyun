<?php
    $domain = $_POST['Domain'];
    $ip = gethostbyname($domain);

    echo "<script> alert('IP of ".$domain." is ".$ip."'); location.href='getIP.php'; </script>";

?>
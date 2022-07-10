<?php
    session_start();

    ini_set('display_errors', '0');
?>

<header>
    <nav class="navbar navbar-expand-lg bg-warning">
    <div class="container-fluid">
        <a style="padding-left:30px;" class="navbar-brand" href="index.php"> WebH3ll </a>
        <!--<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>-->
        <div style="float:right; padding-right:30px;"><!-- class="collapse navbar-collapse" id="navbarNav">-->
        <ul class="navbar-nav mr-auto">

            
            <? if ($_SESSION['isLoginId']) { ?>
                <li class="nav-item">
                <a class="nav-link" href="getIP.php">IP</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="list.php">List</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="config.php">Config</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="preCP.php">ChangePassword</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
                </li>
            <? } else { ?>
                <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
                </li>
            <? } ?>

        </ul>
        </div>
    </div>
    </nav>
</header>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<link href="css/navbar.css" rel="stylesheet" />
</head>
<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <?php
        include "./script/navbar.php";
        
        if (!$_SESSION['isLoginId']) {
            echo "<script> alert('Please login first'); location.href='index.php'; </script>";
        }
        
    ?>
    

    <div style="width:400px; float:center; margin:0 auto;" class="border">
        <form style="margin:30px;" action="getIPProc.php" method="POST">
            <div class="mb-3">
                <label for="InputPassword" class="form-label">Domain Address</label>
                <input type="text" name="Domain" class="form-control" placeholder="Enter Domain Address to find IP">
            </div>
        
            <button type="submit" class="btn btn-warning">Submit</button>
        </form>
    </div>


    
</body>
</html>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<link href="css/navbar.css" rel="stylesheet" />

</head>
<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <? include "./script/navbar.php"; ?>

    <div style="width:400px; float:center; margin:0 auto;" class="border">
        <form style="margin:30px;" action="loginProc.php" method="POST" onsubmit="return chkFrm();">
            <div class="mb-3">
                <label for="InputId" class="form-label">Username</label>
                <input type="text" name="Id" class="form-control" id="Id" placeholder="Username">
            </div>
            <div class="mb-3">
                <label for="InputPassword" class="form-label">Password</label>
                <input type="password" name="Password" class="form-control" id="Password" placeholder="Password">
            </div>
            
            <button type="submit" class="btn btn-warning">Submit</button>
        </form>
    </div>
</body>
</html>



<script>
    // 빈 공간 체크
    function chkFrm() {
        var id = document.getElementById("Id").value;
        var password = document.getElementById("Password").value;

        if (id == "") {
            alert("Please enter your ID");
            document.getElementById("Id").focus();

            return false;
        }
        else if (password == "") {
            alert("Please enter your Password");
            document.getElementById("Password").focus();

            return false;
        }

        return true;        
    }

</script>
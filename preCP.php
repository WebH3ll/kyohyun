<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChangePassword</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<link href="css/navbar.css" rel="stylesheet" />



</head>
<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <? include "./script/navbar.php"; ?>

    <div style="width:400px; float:center; margin:0 auto;" class="border">
        <form style="margin:30px;" action="changePassword.php" method="POST" onsubmit="return chkFrm();">
            <div class="mb-3">
                <label for="InputPassword" class="form-label">Password</label>
                <input type="password" name="Password" class="form-control" id="Password" placeholder="Please enter your current Password">
            </div>
        
            <button type="submit" class="btn btn-warning">Submit</button>
        </form>
    </div>
</body>
</html>



<script>
    // 빈 공간 체크
    function chkFrm() {
        var password = document.getElementById("Password").value;

        if (password == "") {
            alert("Please enter your Password");
            document.getElementById("Password").focus();

            return false;
        }

        return true;        
    }

</script>
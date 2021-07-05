<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登陸</title>
</head>
<body>
<form name="login" method="post">
    <p align="center">Username<input type=text name="username" required></p>
    <p align="center">Password<input type=password name="password" required></p>
    <div align="center">
        <input type="submit" name="submit" value="submit">
        <input type="button" onclick="window.location.href='index.php'" value="Back to home page"></input>
    </div>
</form>
</body>
</html>

<?php
if(isset($_POST["submit"])){
    include ("DataManager.php");

    $obj = new DatabaseFunction();

    $check = $obj->login_check($_POST["username"], $_POST["password"]);
    if($check){
        session_start();
        $_SESSION["username"] = $_POST["username"] ?>
        <script>
            alert ("歡迎! <?php echo $_POST["username"];?>")
            window.location.href="post.php";
        </script>
<?php
    }
    else{ ?>
        <script>
            alert ("使用者名稱或密碼錯誤");
            login.onreset();
        </script>
<?php
    }
} ?>
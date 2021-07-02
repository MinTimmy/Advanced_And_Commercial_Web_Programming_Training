<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登陸</title>
</head>
<body>
<form name="login" method="post">
    <p>Username<input type=text name="username"></p>
    <p>Password<input type=password name="password"></p>
    <p><input type="submit" name="submit" value="submit"></p>
</form>
</body>
</html>

<?php
if(isset($_POST["submit"]))//只用submit存在才能執行
{
    include ("connMysql.php");

    $usr = $_POST["username"];
    $pwd = $_POST["password"];

    $cusr=$db_link->query("select * from user where username='$usr';");
    $cpwd=$db_link->query("select * from user where username='$usr' and password='$pwd';");

    $cpwd->execute();
    $row1 = $cusr->fetch(PDO::FETCH_BOTH);
    $row2 = $cpwd->fetchAll(PDO::FETCH_BOTH);
    #$row3 = $cpwd->fetchAll(PDO::FETCH_ASSOC);

    if(empty($row1)){
        $db_link = null;
        ?>
        <script>
            alert ("使用者名稱或密碼錯誤");
            login.onreset();
            </script>
<?php
    }
    else if(empty($row2[0]))//同上
    {
        $dbh=null;
    ?>
    <script>
        alert ("使用者名稱或密碼錯誤");
        login.onreset();
    </script>
    <?php
        }
        else
        {
            session_start();
            $_SESSION["PID"] = $row2[0][0];
            $_SESSION["username"] = $row2[0][1];
            $dbh=null;
        ?>
<script>
            alert ("歡迎!  <?php echo $usr;?>");
            window.location.href="post.php";
            </script>
<?php
        }
}
        ?>


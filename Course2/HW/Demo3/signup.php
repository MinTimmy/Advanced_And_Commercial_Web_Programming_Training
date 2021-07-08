<?php include "DataManager.php"; ?>
<form  method="post" name="signup" style="border:1px solid #ccc">
    <div class="container">
        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>
        <label ><b>username</b></label>
        <input type="text" name="username" required>

        <label><b>Password</b></label>
        <input type="password" name="psw" required>

        <div class="clearfix">
            <button type="button" onclick="window.location.href='index.php'">Back to home page</button>
            <button name="submit" type="submit" >Sign Up</button>
        </div>
    </div>
</form>
<?php
if(isset($_POST["submit"])){
    $obj = new DatabaseFunction();
    if(strlen($_POST["username"]) < 5 and strlen($_POST["password"]) < 5){?>
        <script> alert ("帳號密碼必須超過5個字");</script>
<?php
    }

    else{
        if($obj->checkUsername($_POST["username"])){
            $obj->newUser($_POST["username"], $_POST["psw"]);
            echo "註冊成功";
//            header("Location: login.php");
        }
        else{ ?>
            <script>
                alert ("帳號已存在，請重新輸入新的帳號密碼");
                signup.onreset();
            </script>
            <?php
        }
   }
} ?>
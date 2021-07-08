<html>
    <head>
        <meta charset="UTF-8">
        <title>FantasticBook</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
    <p align="center"><?php session_start(); echo "You are ".$_SESSION["username"]?></p>
    <center>

    <form method="post" >
        <textarea name="textarea1" ></textarea>
        <br>
        <input type="submit" name="submit" value="submit">
    </form>
    <button onclick="window.location.href = 'login2.php';">login</button>
    <button onclick="window.location.href = 'index.php';">logout</button>
    </center>
<?php

include("DataManager.php");
include ("./api/all_post.php");

$obj = new DatabaseFunction();
if(isset($_POST["submit"]) and  !empty($_POST["textarea1"])){
    if(strlen($_POST["textarea1"]) <= 140){
        $obj->newMessage($_POST["textarea1"], $_SESSION["PID"]);
    }
    else{?>
        <script> alert("字數不可以超過140") </script>
<?php
    }
}
refreshBoard($obj);


function refreshBoard($obj)
{
    $board_message = $obj->getBoardMessage(); ?>

<!--    <div id="board" style="border: 1px solid black;" align="center">-->
<!--        --><?php //foreach($board_message as $data){ ?>
<!--            <div id="subboard">-->
<!--                --><?php //$user_name = $obj->getUsername($data["user_id"]);?>
<!--                <p align="left"> --><?php //echo $user_name ?><!--</p>-->
<!--                <p align="center"> --><?php //echo $data["message"] ?><!-- </p>-->
<!--                <p align="right"> --><?php //echo $data["post_time"] ?><!-- </p>-->
<!--            </div>-->
<!--    --><?php //
//    }
}
?>
    </body>
</html>
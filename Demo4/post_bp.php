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
$obj = new DatabaseFunction();
if(isset($_POST["submit"]) and  !empty($_POST["textarea1"])){
    if(strlen($_POST["textarea1"]) <= 140){
        $obj->new_message($_POST["textarea1"], $_SESSION["PID"]);
    }
    else{?>
        <script> alert("字數不可以超過140") </script>
<?php
    }
}
refresh_board($obj);


function refresh_board($obj){
$board_message = $obj->get_board_message(); ?>
    <div id="board" style="border: 1px solid black;" align="center">
        <?php for($i = count($board_message) - 1, $count = 0; $i >= 0 and $count < 100 ; $i--, $count++){ ?>
            <div id="subboard" >
                <?php $user_name = $obj->get_username($board_message[$i]["user_id"]);?>
                <p align="left"> <?php echo $user_name ?></p>
                <p align="center"> <?php echo $board_message[$i]["message"] ?> </p>
                <p align="right"> <?php echo $board_message[$i]["post_time"] ?> </p>
            </div>
        <?php } ?>
    </div>
    <?php
}
?>
    </body>
</html>
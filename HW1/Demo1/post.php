<?php
    include("DataManager.php");
    if( strcmp( $_POST["login"], "anonymous") == 0){
        session_start();
        $_SESSION["username"] = "anonymous";
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>FantasticBook</title>
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

$obj = new GetData();


if(isset($_POST["submit"]) and  !empty($_POST["textarea1"])){
    echo $_SESSION["PID"];
    $obj->newMessage($_POST["textarea1"], $_SESSION["PID"]);

    $board_message = $obj->getBoardMessage();

    ?>
    <div id="board"style="border: 1px solid black; background: yellow" align="center">
            <?php for($i = count($board_message) - 1; $i >=0; $i--){
                $user_name = $obj->getUsername($board_message[$i]["user_id"]);
            ?> <p> <?php echo "[ ".$user_name." ".$board_message[$i]["post_time"]." ] ".$board_message[$i]["message"];  ?> </p>
            <?php
            } ?>
   </div>
    <?php
}

?>
    </body>
</html>
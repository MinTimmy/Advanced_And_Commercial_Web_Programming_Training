<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title></title>
</head>
    <h1>Welcome to Fantastic</h1>
    <table border="2px">
        <thead>
            <tr>
                <th>command</th>
                <th>Your choose</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="command">log in other account</td>
                <td align="center"><button class="user_chooses" onclick=" window.location.href = 'login.php';">login</button></td>
            </tr>
            <tr>
                <td class="command">log in as anonymous</td>
                <td align="center">
                    <form method="POST" action="post.php">
                        <?php session_start(); $_SESSION["PID"] = 1; ?>
                        <input class="user_chooses" type="submit" name="login" value="anonymous"/>
                    </form>
                </td>
            </tr>
            <tr>
                <td class="command">sign up new account</td>
                <td align="center"><button class="user_chooses" onclick=" window.location.href = 'signup.php';">sign up</button></td>
            </tr>
        </tbody>
    </table>
</html>
<?php
    session_start();
    $_SESSION["user_id"] = 1;
    $_SESSION["username"] = "anonymous";
?>
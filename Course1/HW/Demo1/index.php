<html>
  <button onclick="window.location.href = 'login.php';">login</button>


<form method="POST" action="post.php">
    <?php session_start(); $_SESSION["PID"] = 1; ?>
    <input type="submit" name="login" value="anonymous"/>
</form>
</html>
<!DOCTYPE html>
<html>
  <head>
    <title>LOGIN Page</title>
    <link rel="stylesheet" type="text/css" href="stylin.css" />
  </head>
  <body>
    <div id="form">
      <form action="process.php" method="post">
        <p>
          <label>Username: </label> <input type="text" id="user" name="user" />
        </p>
        <p>
          <label>Password: </label>
          <input type="password" id="pass" name="pass" />
          <input type = "hidden" value = "<?php echo $_GET["redirect"] ?>" name = "redirect"/>
        </p>
        <p><input type="submit" id="btn" value="login" /></p><br>
        <div>
          <h3> No account? No problem! </h3>
            <a href = createAccount.php> Click here to make an account!</a>
        </div>
      </form>
      <?php
if (isset($_GET["usernotfound"])) {
    $userNotFound = $_GET["usernotfound"] || false;
    if ($userNotFound) {
        echo "User Not Found";
    }

}

?>
    </div>
  </body>
</html>

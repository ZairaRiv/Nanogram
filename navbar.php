
    <!DOCTYPE html>
    <!-- navbar file to include-->
    <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="howTo.php">How To Play</a></li>
    <li><a href="play.php">Play</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="displayScores.php">High Scores</a></li>
    <li><a href="login.php">Login</a></li>
  </ul>
    <br />

    <!-- user image for login-->
    <a href = "login.php?redirect=<?php echo $_SERVER['REQUEST_URI'] ?>">
      <?php
if (!isset($_COOKIE["username"])) {
    // echo "Cookie is not set!";
} else {
    //echo "Cookie is set!<br>";
    ?>
          <img src = "user-icon.svg" alt = "usericon" width = "20px">
          <span id="username"><?php
echo $_COOKIE["username"];
}
?> </span>
    </a>
    <html>




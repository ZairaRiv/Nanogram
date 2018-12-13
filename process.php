<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div>


<?php
//Connecting to the server
include 'auth.php';
$creds = new credentials();
$credentials = $creds->Get();

// Create connection
$conn = new mysqli($credentials["host"], $credentials["user"], $credentials["password"], $credentials["db"]);

//get vals passed from form in login.php
$username = $_POST['user'];
$password = $_POST['pass'];
$redirect = $_POST['redirect'];

//so that SQL won't butt in
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

//query the dB for user
$sql = "select * from players where username = '$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        //for debugging and testing
        //echo "id: " .$row["id"]. " -Name: " .$row["username"]. " ".$row["password"]. "<br>";
        if ($row['username'] == $username && $row['password'] == $password) {
            setcookie("username", $username, time() + (86400 * 30), "/");
            setcookie("password", $password, time() + (86400 * 30), "/");
            echo "Login Successful.";
            echo '<a href="play.php">Play game!</a>';
            break;
        } else {
            //trying to redirect the page to an error page
            echo "there was an error logging you in";
        }
    }
} else {
    header('Location: login.php?usernotfound=true');
}
?>

    </div>
</body>
</html>

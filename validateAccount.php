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
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//get vals passed from form in login.php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$location = $_POST['location'];
$password = $_POST['password'];
$email = $_POST['email'];
$redirect = $_POST['redirect'];

//push the values into sql
$max = $conn->query("select coalesce(max(id)+1,0) as max from players;");
while ($row = $max->fetch_assoc()) {
    $maxx = $row["max"];
}

$sql = "INSERT INTO Players (id,username, password, firstname, lastname, gender, location, email)
VALUES ($maxx,'$username', '$password', '$firstname', '$lastname', '$gender', '$location', '$email')";

//if it can connect then great you pushed it in there
if ($conn->query($sql) === true) {
    setcookie("username", $username, time() + (86400 * 30), "/");
    setcookie("password", $password, time() + (86400 * 30), "/");
    echo "Login Successful.";
    echo '<a href="play.php">Play game!</a>';
} else {
    //something went wrong
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//closing connection at the end like always
$conn->close();
?>

    </div>
</body>
</html>

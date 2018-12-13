<?php

//Connecting to the server
include 'auth.php';
$creds = new credentials();
$credentials = $creds->Get();

// Create connection
$conn = new mysqli($credentials["host"], $credentials["user"], $credentials["password"], $credentials["db"]);

if (!$conn) {
    die('Could not connect: ' . mysql_error());
}
//King Midas, are you doing this right?
//pretty sure these vars need to be checked to match the obj
$_POST = json_decode(file_get_contents('php://input'), true);
$username = $_POST['username'];
$duration = $_POST['duration'];
$numErrors = $_POST['numErrors'];
$gameCol = $_POST['gameCol'];
$score = $_POST['score'];
//not sure if game type has to be passed too
$gameType = $_POST['gameType'];

// now try to insert above into here
$sql = "INSERT INTO game (idGame, username, duration, numErrors, gamecol, score, gameType)
VALUES('$username', '$duration', '$numErrors','$gameCol', '$score','$gameType')";

//if ($conn->query($sql) == false) {
//   return json_encode(array("success" => "false"));
//}

echo $sql;
//$conn->query($sql);

//return json_encode(array("success" => "true"));

$conn->close();

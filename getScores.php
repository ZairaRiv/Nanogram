<?php
//Connecting to the server
include 'auth.php';
$creds = new credentials();
$credentials = $creds->Get();

// Create connection
$conn = new mysqli($credentials["host"], $credentials["user"], $credentials["password"], $credentials["db"]);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . "<br>");
}

$sql = "SELECT * from game order by score desc, duration desc";
$result = $conn->query($sql);
$output = array();
$output = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($output);

// close the connection, probably good to do at the end??
$conn->close();

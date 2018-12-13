<?php

include 'auth.php';
$creds = new credentials();
$credentials = $creds->Get();

// Create connection
$conn = new mysqli($credentials["host"], $credentials["user"], $credentials["password"], $credentials["db"]);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . "<br>");
}

$var = $_GET["size"];

$sql = "SELECT idlevels, jsonData, name FROM levels where gameType = $var";
$result = $conn->query($sql);
$output = array();
$output = $result->fetch_all(MYSQLI_ASSOC);

//need to select different levels for the bigger grid
echo json_encode($output);

// close the connection, probably good to do at the end??
$conn->close();
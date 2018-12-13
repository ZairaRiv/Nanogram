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
echo "Connected successfully <br>";

// close the connection, probably good to do at the end??
$conn->close();

<?php
//remember to run just run install.php to get the gaming installed
include 'auth.php';
$creds = new credentials();
$credentials = $creds->Get();
$sqldump = "mysql.dump";

// Create connection
$mysqli = new mysqli($credentials["host"], $credentials["user"], $credentials["password"]);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Install Picross</title>
</head>
<body>

<?php

$mysqli->query("create database " . $credentials["db"]);
echo "Database created.";
echo "<br><br>";
echo "Connecting to new db " . $credentials["db"];
$mysqli->close();
$mysqli = new mysqli($credentials["host"], $credentials["user"], $credentials["password"], $credentials["db"]);

$mysqli->query("select database " . $credentials["db"]);

$success = run_sql_file($sqldump, $mysqli);

echo "<br><br>";
echo "Success:";
echo $success["success"];
echo "<br>";
echo "Total: ";
echo $success["total"];

function run_sql_file($location, $mysqli)
{
    //load file
    $commands = file_get_contents($location);

    //delete comments
    $lines = explode("\n", $commands);
    $commands = '';
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line && !startsWith($line, '--') && !startsWith($line, '/*')) {
            $commands .= $line;
        }
    }

    //convert to array
    $commands = explode(";", $commands);

    //run commands
    $total = $success = 0;
    foreach ($commands as $command) {
        if (trim($command)) {
            //echo $command;
            //echo "<br>";
            $succ = $mysqli->query($command);
            //echo $succ;

            $success += ($succ == false ? 0 : 1);
            $total += 1;

            if ($succ == true) {
                //echo "Query Success<br>";
            } else {
                //echo "Error: " . $mysqli->error;
            }
            //echo "<br>";
            //echo "<br>";
        }
    }

    //return number of successful queries and total number of queries found
    return array(
        "success" => $success,
        "total" => $total,
    );
}

// Here's a startsWith function
function startsWith($haystack, $needle)
{
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
}

$mysqli->close();
?>

</body>
</html>
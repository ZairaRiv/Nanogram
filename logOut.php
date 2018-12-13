<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Logout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div>


<?php
unset($_COOKIE[$username]);
unset($_COOKIE[$password]);
header('Location: ./play.php');
?>

    </div>
</body>
</html>
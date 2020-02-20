<?php
session_start();

// check to see if a username exists.  If not, return to login page.
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}else {
    header("Location: ta07-signIn.php");
    die(); // always add when redirecting
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
</head>
<body>
<div>
<h1>Welcome to Week 7's Homepage!</h1>
Your username is: <?= $username ?>
<br /><br />
</div>
    
</body>
</html>
<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
<div>
<h1>Sign up for a new account</h1>

<form action="ta07-createAccount.php" method="POST" id="createAccount">

    <input type="text" id="username" name="username" placeholder="username">
    <label for="username">Username</label>
    <br /><br />

    <input type="submit" value="Create Account" name="createAccount" id="createAccount">
</form>
</div>
</body>
</html>

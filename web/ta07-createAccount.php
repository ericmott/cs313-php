<?php
// get data from post
$username = $_POST['username'];
$password = $_POST['password'];

if (!isset($username) || $username == "") {
    header("Location: signUp.php");
    die(); // always include after redirect
}

// prevent HTML from being in user names
$username = htmlspecialchars($username);

// get hashed password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// connect to the database
require("dbConnect.php");
$db = get_db();

$query = 'INSERT INTO login(username, password) VALUES(:username, :password)';
$statement = $db->prepare($query);
$statement->bindValue(':username', $username);

// *****************************************
// * NOTICE: Submitting the hased password *
// *****************************************
$statement->bindValue(':password', $hashedPassword);

$statement->execute();

// redirect to sign in page
header("Location: signIn.php");
die(); // always include after redirect
?>
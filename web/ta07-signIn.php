<?php
    session_start();
    
    $badLogin = false;

    // Check for post variables
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // there is a username and password to check
        $username = $_POST['username'];
        $password = $_POST['password'];

        // connect to database
        require 'db_connect.php';
        $db = get_db();

        $query = 'SELECT password FROM ta07User WHERE username=:username';

        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);

        $result = $statement->execute();

        if ($result) {
            $row = $statment->fetch();
            $hashedDbPsw = $row['password'];

            // verify passwords match
            if (password_verify($password, $hashedDbPsw)) {
                
                // correct password, load user into session, go to home page
                $_SESSION['username'] = $username;
                header("Location: ta07-welcome.php");
                die();  // always use die after redirecting to prevent anything else loading.
            }else {
                $badLogin = true;
            }
        }else {
            $badLogin = true;
        }
    }

    // if you haven't been redirected yet, build the login form
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>
<body>
<div>

<?php
if ($badLogin){
    echo "Incorrect username or password! <br /><br />\n";
}
?>

<h1>Sign In:</h1>

<form action="ta07-signIn.php" method="POST">
    <input type="text" name="username" id="username" placeholder="UserName">
    <label for="username">Username</label>
    <br /><br />

    <input type="password" id="password" name="password" placeholder="Password">
    <label for="password">Password</label>
    <br /><br />

    <input type="submit" value="Sign In" /> 
</form>

<br /><br />

Or <a href="ta07-signUp.php">Sign Up</a> for a new account.
</div>

</body>
</html>


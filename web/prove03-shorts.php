<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eric Mott - Prove 03</title>
    <link rel="stylesheet" href="prove03-styles.css">
</head>
<body>

<?php
// add 1 to total quantity of shorts
$_SESSION["totalShortsQty"] += 1;
return $_SESSION["totalShortsQty"];
?>
    
</body>
</html>
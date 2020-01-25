<?php
session_start();
?>


<?php
// add 1 to total quantity of shorts
$_SESSION["totalShortsQty"] = 12;
$test = $_SESSION["totalShortsQty"]
return $test;
// return $_SESSION["totalShortsQty"];
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
    <script>
        var shortsTotal = "<?php echo $test; ?>"
    </script>


<!-- <a> test2 </a> -->
    
</body>
</html>
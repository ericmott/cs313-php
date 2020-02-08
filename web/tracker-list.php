<?php
function get_db(){
    $db = NULL;

try
{
    $dbUrl = getenv('DATABASE_URL');

    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"],'/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
    echo 'Error!: ' - $ex->getMessage();
    die();
}
return $db;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory Tracker - Master List</title>
    <link rel="stylesheet" href="cs313-styles.css">
</head>

<body>
    <header>
        <h1>Household Inventory Tracker</h1>
        <nav>
            <ul>
                <li><a href="prove05.html">Home</a></li>
            </ul>
        </nav>
        <hr>
        <h1>Inventory List</h1>
        <hr>
    </header>

    <main>
        <?php
        foreach ($db->('SELECT id, itemDescription, model, serialNumber, purchasePrice, purchaseDate FROM item') as $row) {
            echo "<div>" "Item: " . $row["itemDescription"] . " | Model: " . $row["model"] . " | S/N: " . $row["serialNumber"] . " | Purchase Price $" . $row["purchasePrice"] . " | Date Purchased: " . $row["purchaseDate"];
            echo '<br/>';
        }
        ?>

    </main>

    <footer>
        <div class="blu-wht">
            <p style="margin-left:10px;">&copy; Eric Mott, 2020</p>
        </div>
    </footer>

    <script src="prove02-script.js"></script>

</body>

</html>
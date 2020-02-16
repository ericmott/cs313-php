<?php
require('dbConnect.php');
$db = get_db();

// From the reading:
// $stmt = $db->prepare('SELECT * FROM table WHERE id=:id AND name=:name');
// $stmt->bindValue(':id', $id, PDO::PARAM_INT);
// $stmt->bindValue(':name', $name, PDO::PARAM_STR);
// $stmt->execute();
// $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get data from item table
$query = 'SELECT itemId, itemDescription, model, serialNumber, purchasePrice, purchaseDate, storeName, room, firstName, lastName FROM item
     LEFT OUTER JOIN store ON (item.store_id = store.storeId)
     LEFT OUTER JOIN room ON (item.room_id = room.roomId)
     LEFT OUTER JOIN ownedBy ON (item.owner_id = ownedBy.ownedById)';
$stmt = $db->prepare($query);
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get data from store table
// $query = 'SELECT storeId, storeName FROM store';
// $stmt1 = $db->prepare($query);
// $stmt1->execute();
// $stores = $stmt1->fetchAll(PDO::FETCH_ASSOC);

// Get data from room table
// $query = 'SELECT roomId, room FROM room';
// $stmt2 = $db->prepare($query);
// $stmt2->execute();
// $rooms = $stmt2->fetchAll(PDO::FETCH_ASSOC);

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
                <li><a href="prove06.html">Home</a></li>
            </ul>
        </nav>
        <hr>
        <h1>Inventory List</h1>
        <hr>
    </header>

    <main>
        <div>
        <?php
        // foreach ($db->('SELECT itemDescription, model, serialNumber, purchasePrice, purchaseDate FROM item') as $row) {
        //     echo "<div>" "Item: " . $row["itemDescription"] . " | Model: " . $row["model"] . " | S/N: " . $row["serialNumber"] . " | Purchase Price $" . $row["purchasePrice"] . " | Date Purchased: " . $row["purchaseDate"];
        //     echo '<br/>';
        // }
        foreach ($items as $item) {
            $itemId = $item['itemId'];
            $itemDescription = $item['itemdescription'];
            $model = $item['model'];
            $serialNumber = $item['serialnumber'];
            $purchasePrice = $item['purchaseprice'];
            $purchaseDate = $item['purchasedate'];
            $storeName = $item['storename'];
            $room = $item['room'];
            $firstName = $item['firstname'];
            $lastName = $item['lastname'];

            echo "<li>Item: $itemDescription | Model: $model | S/N: $serialNumber | Purchase Price: $purchasePrice | Date Purchased: $purchaseDate | Purchased At: $storeName | Located: $room | Owner: $firstName $lastName";
        }
        ?>
        </div>
        <div>
            <!-- Add Show Items Button -->
            <form action="tracker-list.php">
                <button class="button-std" href="tracker-list.php" title="Show List of Items">Show List</button>
            </form>
        </div>

    </main>

    <footer>
        <div class="blu-wht">
            <p style="margin-left:10px;">&copy; Eric Mott, 2020</p>
        </div>
    </footer>

    <script src="prove02-script.js"></script>

</body>

</html>
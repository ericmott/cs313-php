<?php
/* make connection to DB */
require('dbConnect.php');
$db = get_db();


// get the data from the POST
$description = $_POST['description'];
$model = $_POST['model'];
$serialNumber = $_POST['serialNumber'];
$purchasePrice = $_POST['purchasePrice'];
$purchaseDate = $_POST['purchaseDate'];
$storeName = $_POST['storeName'];  // *************************** Need to look up key if already existing ****
$room = $_POST['room'];  // *************************** Need to look up key if already existing ****
$firstName = $_POST['firstName'];  // *************************** Need to look up key if already existing ****
$lastName = $_POST['lastName'];  // *************************** Need to look up key if already existing ****


try
{
    echo '<script>';
    echo 'console.log("In the try statement")';
    echo '</script>';
    // Add item details to DB
    // get data from tables to verify uniqueness of entries
    $storeQuery = 'SELECT storeId, storeName FROM store';
    $storeStmt = $db->prepare($storeQuery);
    $storeStmt->execute();
    $existingStores = $storeStmt->fetchAll(PDO::FETCH-ASSOC);

    // $roomQuery = 'SELECT roomId, room FROM room';
    // $roomStmt = $db->prepare($roomQuery);
    // $roomStmt->execute();
    // $existingRooms = $roomStmt->fetchAll(PDO::FETCH-ASSOC);
    // // console.log("pulled existing room data: " $existingRooms);

    // $ownedByQuery = 'SELECT ownedById, firstName, lastName FROM ownedBy';
    // $ownedByStmt = $db->prepare($ownedByQuery);
    // $ownedByStmt->execute();
    // $existingOwnedBys = $ownedByStmt->fetchAll(PDO::FETCH-ASSOC);
    // // console.log("pulled existing owner data: " $existingOwnedBys);

    // // check if store exists
    // foreach ($existingStores as $existingStore) {
    //     // if store exists, assign existing ID to new item
    //     if ($existingStore['storeName'] == $storeName){
    //         $store_id = $existingStore['storeId'];
    //         console.log("a store exists " $store_id);
    //     } else {
    //         // if new store, add to table
    //         $query = 'INSERT INTO store(storeName) VALUES(:storeName)';
    //         $statement = $db->prepare($query);
    //         /* Now we bind the values to the placeholders. This does some nice things
    //         including sanitizing the input with regard to sql commands. */
    //         $statement->bindValue(':storeName', $storeName);
    //         $statement->execute();
    //         // get the new store id
    //         $store_id = $db->lastInsertId(store_storeId_seq);
    //         console.log("a new store added " $storeName);
    //     }
    // }

    // // check if room exists
    // foreach ($existingRooms as $existingRoom) {
    //     // if room exists, assign existing ID to new item
    //     if ($existingRoom['room'] == $room){
    //         $room_id = $existingRoom['roomId'];
    //     } else {
    //         // if new room, add to table
    //         $query = 'INSERT INTO room(room) VALUES(:room)';
    //         $statement = $db->prepare($query);
    //         $statement->bindValue(':room', $room);
    //         $statement->execute();
    //         // get the new store id
    //         $room_id = $db->lastInsertId(room_roomId_seq);
    //     }
    // }

    // // check if owner exists
    // foreach ($existingOwnedBys as $existingOwnedBy) {
    //     // if owner exists, assign existing ID to new item
    //     if ($existingOwnedBy['firstName'] == $firstName && $existingOwnedBy['lastName'] == $lastName){
    //         $owner_id = $existingOwnedBy['ownedById'];
    //     } else {
    //         // if new owner, add to table
    //         $query = 'INSERT INTO ownedBy(ownedById) VALUES(:room)';
    //         $statement = $db->prepare($query);
    //         $statement->bindValue(':firstName', $firstName);
    //         $statement->bindValue(':lastName', $lastName);
    //         $statement->execute();
    //         // get the new store id
    //         $owner_id = $db->lastInsertId(ownedBy_ownedById_seq);
    //     }
    // }
    
    /* *** Add Item to DB *** */
    $query = 'INSERT INTO item(itemDescription, model, serialNumber, purchasePrice, purchaseDate, store_id, owner_id, room_id) VALUES(:itemDescription, :model, :serialNumber, :purchasePrice, :purchaseDate, :store_id, :owner_id, :room_id)';
	$statement = $db->prepare($query);

	$statement->bindValue(':itemDescription', $itemDescription);
	$statement->bindValue(':model', $model);
	$statement->bindValue(':serialNumber', $serialNumber);
    $statement->bindValue(':purchasePrice', $purchasePrice);
    $statement->bindValue(':purchaseDate', $purchaseDate);
    $statement->bindValue(':store_id', $store_id);
    $statement->bindValue(':owner_id', $owner_id);
    $statement->bindValue(':room_id', $room_id);

	$statement->execute();

}
catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}

// redirect list of items page
header("Location: tracker-list.php");

die(); // always include a die after redirects
?>
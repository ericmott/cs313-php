<?php
/* make connection to DB */
require('dbConnect.php');
$db = get_db();


// get the data from the POST
$itemDescription = htmlspecialchars($_POST['description']);
$model = htmlspecialchars($_POST['model']);
$serialNumber = htmlspecialchars($_POST['serialNumber']);
$purchasePrice = htmlspecialchars($_POST['purchasePrice']);
$purchaseDate = htmlspecialchars($_POST['purchaseDate']);
$storeName = htmlspecialchars($_POST['storeName']);  // *************************** Need to look up key if already existing ****
$room = htmlspecialchars($_POST['room']);  // *************************** Need to look up key if already existing ****
$firstName = htmlspecialchars($_POST['firstName']);  // *************************** Need to look up key if already existing ****
$lastName = htmlspecialchars($_POST['lastName']);  // *************************** Need to look up key if already existing ****

// $store_id = 1;
$room_id = 1;
$owner_id = 1;

$storeQuery = 'SELECT storeName FROM store';
$storeStmt = $db->prepare($storeQuery);
$executeSuccess = $storeStmt->execute();
$existingStoresInTable = $storeStmt->fetchAll(PDO::FETCH-ASSOC);

// If store table empty, add new store
if (empty($existingStoresInTable)) {
    // Add to DB
    $query = 'INSERT INTO store(storeName) VALUES(:storeName)';
    $statement = $db->prepare($query);
    
    $statement->bindValue(':storeName', $storeName);
    $statement->execute();

    $store_id = $db->lastInsertId(store_storeId_seq);
} else {
    // check for existing store ID
    $query = 'SELECT storeId, storeName FROM store WHERE storeName = :storeName';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $existingStore = $stmt->fetchAll(PDO::FETCH-ASSOC);

    if (empty($existingStore)) {
        // Add to DB
        $query = 'INSERT INTO store(storeName) VALUES(:storeName)';
        $statement = $db->prepare($query);
        
        $statement->bindValue(':storeName', $storeName);
        $statement->execute();

        $store_id = $db->lastInsertId(store_storeId_seq);
    } else {
        foreach ($existingStore as $store) {
            $storeId = $store['storeId'];
        }
    }
}


try
{
    // ****************************************************
    // ****************************************************

    // $storeExists = false;
    $roomExists = false;
    $ownerExists = false;

    // // Add item details to DB
    // // get data from tables to verify uniqueness of entries
    // $storeQuery = 'SELECT storeId, storeName FROM store';
    // $storeStmt = $db->prepare($storeQuery);
    // $storeStmt->execute();
    // $existingStores = $storeStmt->fetchAll(PDO::FETCH-ASSOC);

    // // check if store exists
    // for ($i = 0; $i < $storeQuery.length(); $i++) {
    //     // if store exists, assign existing ID to new item
    //     if ($storeQuery(':storeName') == $storeName){
    //         $store_id = $existingStore(':storeId');
    //     } else {
    //         // if new store, add to table
    //         $newStoreQuery = 'INSERT INTO store(storeName) VALUES(:storeName)';
    //         $statement = $db->prepare($newStoreQuery);
    //         /* Now we bind the values to the placeholders. This does some nice things
    //         including sanitizing the input with regard to sql commands. */
    //         $statement->bindValue(':storeName', $storeName);
    //         $statement->execute();
    //         // get the new store id
    //         $store_id = $db->lastInsertId(store_storeId_seq);
    //     }
    // }

    // $storeQuery = 'SELECT storeId, storeName FROM store WHERE storeName = :storeName';
    // $storeResult = $db->prepare($storeQuery);
    // $stores = $storeResult->fetchAll(PDO::FETCH_ASSOC);

    // if ($storeExists = false) {
    //     foreach ($stores as $store) {
    //         $store_id = $store['storeId'];
    //         $storeExists = true;
    //     }
    // }

    // $storeQuery = 'SELECT storeId, storeName FROM store WHERE storeName = :storeName';
    // $storeResult = $db->query($storeQuery);
    // $storeResult->bindParam(':storeId', $store_id)
    // // $stores = $storeResult->fetchAll(PDO::FETCH_ASSOC);

    // // if ($storeResult->num_rows > 0) {
    //     while($row = $storeResult->fetch_assoc()) {
    //         $store_id = $row['storeId'];
    //         $storeExists = true;
    //     }
    // // }

    // // ****************************************************************** last commented out
    // $storeQuery = 'SELECT storeId, storeName FROM store';
    // foreach($db->query($storeQuery)as $row){
    //     if ($row['storeName'] == $storeName){
    //         $store_id = $row['storeId'];
    //         $storeExists = true;
    //     }
    // }
    // // *************************************************************************************
    // $stores = $storeResult->fetchAll(PDO::FETCH_ASSOC);

    // // if ($storeResult->num_rows > 0) {
    //     while($row = $storeResult->fetch_assoc()) {
    //         $store_id = $row['storeId'];
    //         $storeExists = true;
    //     }
    // // }

    // $rows = 'SELECT COUNT(*) FROM store';
    // $rows = pg_num_rows($storeResult);
    // $rows = $storeResult->pg_num_rows;
    // $storeExists = false;
    // for ($i = 0; $i < $rows; $i++){
    //     $row = $storeResult->fetch_array(MYSQLI_NUM);
    //     $storeExists = true;
    //     if ( $storeName == $row[1]){
    //         $store_id = $row[0];
    //     }
    // }

    // if ($storeResult->num_rows > 0) {
    //     while($row = $storeResult->fetch_assoc()){
    //         if ($storeName == $row[1]){
    //             $store_id = $row[0];
    //             $storeExists = true;
    //         }
    //     }
    // }

    // for ($i = 0; $i < $rows; $i++){
    //     $row = $storeResult->fetch_array(MYSQLI_NUM);
    //     $storeExists = true;
    //     if ($storeName == $row[1]){
    //         $store_id = $row[0];
            
    //     }
    // }
    // if ($storeExists = false){ $store_id = 2;} // ***************************** add to verify change
    // if (!$storeExists){
    //     // if new store, add to table
    //     $newStoreQuery = 'INSERT INTO store(storeName) VALUES(:storeName)';
    //     $statement = $db->prepare($newStoreQuery);
    //     /* Now we bind the values to the placeholders. This does some nice things
    //     including sanitizing the input with regard to sql commands. */
    //     $statement->bindValue(':storeName', $storeName);
    //     $statement->execute();
    //     // get the new store id
    //     $store_id = $db->lastInsertId(store_storeId_seq);
    // }

    // *******************************************************
    // *******************************************************


    // $roomQuery = 'SELECT roomId, room FROM room';
    // $roomStmt = $db->prepare($roomQuery);
    // $roomStmt->bindValue(':roomId', $roomId, PDO::PARAM_INT);
    // $roomStmt->bindValue(':room', $room, PDO::PARAM_STR);
    // $roomStmt->execute();
    // $existingRooms = $roomStmt->fetchAll(PDO::FETCH-ASSOC);

    // $roomQuery = 'SELECT roomId, room FROM room  WHERE room=:room';
    // $roomStmt = $db->prepare($roomQuery);
    // $roomStmt->bindValue(':roomId', $roomId, PDO::PARAM_INT);
    // $roomStmt->bindValue(':room', $room, PDO::PARAM_STR);
    // $roomStmt->execute(array(':roomId' => $room_Id, 'room' => $room));
    // $roomStmt->execute();
    // $existingRooms = $roomStmt->fetchAll(PDO::FETCH-ASSOC);

    // $existingRooms->execute('SELECT roomId, room FROM room  WHERE room=:room')->fetchAll(PDO::FETCH-ASSOC);




    // $ownedByQuery = 'SELECT ownedById, firstName, lastName FROM ownedBy';
    // $ownedByStmt = $db->prepare($ownedByQuery);
    // $ownedByStmt->execute();
    // $existingOwnedBys = $ownedByStmt->fetchAll(PDO::FETCH-ASSOC);

    // // check if room exists
    // foreach ($existingRooms as $existingRoom) {
    //     // if room exists, assign existing ID to new item
    //     if ($roomExists == false){
    //         if ($existingRoom['room'] == $room){
    //             $room_id = $existingRoom['roomId'];
    //             $roomExists = true;
    //         }
    //     }
    // }
    // if ($roomExists == false){
    //     $query = 'INSERT INTO room(room) VALUES(:room)';
    //     $statement = $db->prepare($query);
    //     $statement->bindValue(':room', $room);
    //     $statement->execute();
    //     // get the new store id
    //     $room_id = $db->lastInsertId(room_roomId_seq);
    //     $roomExists = true;
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
header("Location: tracker-list2.php");// *************************  Change back to tracker-list ****************

die(); // always include a die after redirects
?>
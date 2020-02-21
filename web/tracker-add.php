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

// ******* TEST TEST TEST **************
// foreach ($stores as $store) {
//     $existingStoreId = $store['storeId'];
//     $existingStoreName = $store['storeName'];

//     if ($existingStoreName === $storeName) {
//         $store_id = $existingStoreId;
//     } else {
//         /* *** Add Store to DB *** */
//         $query = 'INSERT INTO store(storeName) VALUES($storeName)';
//         $statement = $db->prepare($query);
//         $statement->bindValue(':storeName', $storeName);
//         $statement->execute();
//         // get the new store id
//         $store_id = $db->lastInsertId();
//     }

// }
// **************************************

try
{
	// Add item details to DB

    // We do this by preparing the query with placeholder values
    /* *** Add Store to DB *** */  // *************************** Need to look up key if already existing ****
    // *** TEST TEST TEST *************
    $query = 'INSERT INTO store(storeName) VALUES(:storeName)';
    $statement = $db->prepare($query);

	// Now we bind the values to the placeholders. This does some nice things
	// including sanitizing the input with regard to sql commands.
    $statement->bindValue(':storeName', $storeName);

	$statement->execute();

	// get the new store id
    $store_id = $db->lastInsertId(store_storeId_seq);
    // ***************** END TEST END TEST END TEST *** */

    /* *** Add Owner to DB *** */  // *************************** Need to look up key if already existing ****
    $query = 'INSERT INTO ownedBy(firstName, lastName) VALUES(:firstName, :lastName)';
	$statement = $db->prepare($query);

    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);

	$statement->execute();

	// get the new owner id
    $owner_id = $db->lastInsertId(ownedBy_ownedById_seq);
    
    /* *** Add Room to DB *** */  // *************************** Need to look up key if already existing ****
    $query = 'INSERT INTO room(room) VALUES(:room)';
	$statement = $db->prepare($query);

    $statement->bindValue(':room', $room);

	$statement->execute();

	// get the new Room id
	$room_id = $db->lastInsertId(room_roomId_seq);
	
    
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
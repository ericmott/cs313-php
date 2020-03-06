<?php
/* make connection to DB */
require('dbConnect.php');
$db = get_db();
console.log('starting tracker-add2.php');

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

$store_id = 1;
$room_id = 1;
$owner_id = 1;

// $storeQuery = 'SELECT storename FROM store';
// $storeStmt = $db->prepare($storeQuery);
// $executeSuccess = $storeStmt->execute();
// $existingStoresInTable = $storeStmt->fetchAll(PDO::FETCH-ASSOC);

// // If store table empty, add new store
// if (empty($existingStoresInTable)) {
//     console.log('In the empty IF statement');
//     // Add to DB
//     $query = 'INSERT INTO store(storeName) VALUES(:storeName)';
//     $statement = $db->prepare($query);
    
//     $statement->bindValue(':storeName', $storeName);
//     $statement->execute();

//     $store_id = $db->lastInsertId(store_storeId_seq);
// } else {
    console.log('in the not empty ELSE statement');
    // // check for existing store ID
    // $query = 'SELECT storeId, storeName FROM store WHERE storeName = :storeName';
    // $stmt = $db->prepare($query);
    // // add bind
    // $stmt->bindValue(':storeName', $storeName);
    // $stmt->execute();
    // $existingStore = $stmt->fetchAll(PDO::FETCH-ASSOC);

    // if (empty($existingStore)) {
    //     console.log('in the empty store IF statement');
    //     // Add to DB
    //     $query = 'INSERT INTO store(storeName) VALUES(:storeName)';
    //     $statement = $db->prepare($query);
        
    //     $statement->bindValue(':storeName', $storeName);
    //     $statement->execute();

    //     $store_id = $db->lastInsertId(store_storeId_seq);
    // } else {
    //     console.log('in the empty store ELSE statement');
    //     foreach ($existingStore as $store) {
    //         $storeId = $store['storeId'];
    //     }
    // }
// }

console.log('out of the checking phase');

try
{
   
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
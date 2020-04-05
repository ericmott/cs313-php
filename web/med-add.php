<?php
/* make connection to DB */
require('dbConnect.php');
$db = get_db();

// Query to get existing medications
$medList = $db->query('SELECT medication FROM medication order by medication asc');
while ($row = $medList->fetch(PDO::FETCH_ASSOC))
{
    $medications[] = $row['medication'];
}

// Query to get existing doctors
$docList = $db->query('SELECT docLastName FROM doctor order by docLastName asc');
while ($row = $docList->fetch(PDO::FETCH_ASSOC))
{
    $doctors[] = $row['medication'];
}

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
        // Check if store name already exists in DB, if not, add it
        $storeStatement = $db->prepare('SELECT storeName FROM store WHERE storeName = :storeName');
        $storeStatement->bindParam(':storeName', $storeName);
        $executeSuccess = $storeStatement->execute();
        $newStoreName = $storeStatement->fetchAll(PDO::FETCH_ASSOC);

        if (empty($newStoreName)) {
            //Add to DB
            // $addStoreStatement = $db->prepare('CALL addStore (:storeName)');
            // $addStoreStatement->bindParam(':storeName', $storeName);
            // $executeSuccess = $addStoreStatement->execute();

            $query = 'INSERT INTO store(storeName) VALUES(:storeName)';
            $statement = $db->prepare($query);
            $statement->bindValue(':storeName', $storeName);
            $statement->execute();
        }
        // Get storeId (Primary Key)
        $addstoreIdStatement = $db->prepare('SELECT storeId FROM store WHERE storeName = :storeName');
        $addstoreIdStatement->bindParam(':storeId', $storeId);
        $executeSuccess = $addstoreIdStatement->execute();
        $newStoreId = $addstoreIdStatement->fetchAll(PDO::FETCH_ASSOC);


        // Check if room name already exists in DB, if not, add it
        $roomStatement = $db->prepare('SELECT room FROM room WHERE room = :room');
        $roomStatement->bindParam(':room', $room);
        $executeSuccess = $roomStatement->execute();
        $newRoomName = $roomStatement->fetchAll(PDO::FETCH_ASSOC);

        if (empty($newRoomName)) {
            //Add to DB
            // $addRoomStatement = $db->prepare('CALL addRoom (:room)');
            // $addRoomStatement->bindParam(':room', $room);
            // $executeSuccess = $addRoomStatement->execute();

            $query = 'INSERT INTO room(room) VALUES(:room)';
            $statement = $db->prepare($query);
            $statement->bindValue(':room', $room);
            $statement->execute();
        }
        // Get roomId (Primary Key)
        $addRoomIdStatement = $db->prepare('SELECT roomId FROM room WHERE room = :room');
        $addRoomIdStatement->bindParam(':roomId', $roomId);
        $executeSuccess = $addRoomIdStatement->execute();
        $newRoomId = $addRoomIdStatement->fetchAll(PDO::FETCH_ASSOC);


        // Check if owner name already exists in DB, if not, add it
        $ownerStatement = $db->prepare('SELECT firstName, lastName FROM ownedBy WHERE firstName = :firstName and lastName = :lastName');
        $ownerStatement->bindParam(':firstName', $firstName);
        $ownerStatement->bindParam(':lastName', $lastName);
        $executeSuccess = $ownerStatement->execute();
        $newOwner = $ownerStatement->fetchAll(PDO::FETCH_ASSOC);

        if (empty($newOwner)) {
            //Add to DB
            // $addOwnerStatement = $db->prepare('CALL addOwnedBy (:firstName, :lastName)');
            // $ownerStatement->bindParam(':firstName', $firstName);
            // $ownerStatement->bindParam(':lastName', $lastName);
            // $executeSuccess = $addOwnerStatement->execute();

            $query = 'INSERT INTO ownedBy(firstName, lastName) VALUES(:firstName, lastName)';
            $statement = $db->prepare($query);
            $statement->bindValue(':firstName', $firstName);
            $statement->bindValue(':lastName', $lastName);
            $statement->execute();
        }
        // Get ownedById (Primary Key)
        $addOwnerIdStatement = $db->prepare('SELECT ownedById FROM ownedBy WHERE firstName = :firstName and lastName = :lastName');
        $addOwnerIdStatement->bindParam(':ownedById', $ownedById);
        $executeSuccess = $addOwnerIdStatement->execute();
        $newOwnerId = $addOwnerIdStatement->fetchAll(PDO::FETCH_ASSOC);
        
        // Add item details to DB

        // // We do this by preparing the query with placeholder values
        // /* *** Add Store to DB *** */  // *************************** Need to look up key if already existing ****
        // // *** TEST TEST TEST *************
        // $query = 'INSERT INTO store(storeName) VALUES(:storeName)';
        // $statement = $db->prepare($query);

        // // Now we bind the values to the placeholders. This does some nice things
        // // including sanitizing the input with regard to sql commands.
        // $statement->bindValue(':storeName', $storeName);

        // $statement->execute();

        // // get the new store id
        // $store_id = $db->lastInsertId(store_storeId_seq);
        // // ***************** END TEST END TEST END TEST *** */

        // /* *** Add Owner to DB *** */  // *************************** Need to look up key if already existing ****
        // $query = 'INSERT INTO ownedBy(firstName, lastName) VALUES(:firstName, :lastName)';
        // $statement = $db->prepare($query);

        // $statement->bindValue(':firstName', $firstName);
        // $statement->bindValue(':lastName', $lastName);

        // $statement->execute();

        // // get the new owner id
        // $owner_id = $db->lastInsertId(ownedBy_ownedById_seq);
        
        // /* *** Add Room to DB *** */  // *************************** Need to look up key if already existing ****
        // $query = 'INSERT INTO room(room) VALUES(:room)';
        // $statement = $db->prepare($query);

        // $statement->bindValue(':room', $room);

        // $statement->execute();

        // // get the new Room id
        // $room_id = $db->lastInsertId(room_roomId_seq);
        
        
        /* *** Add Item to DB *** */
        $query = 'INSERT INTO item(itemDescription, model, serialNumber, purchasePrice, purchaseDate, store_id, owner_id, room_id) VALUES(:itemDescription, :model, :serialNumber, :purchasePrice, :purchaseDate, :store_id, :owner_id, :room_id)';
        $statement = $db->prepare($query);

        $statement->bindValue(':itemDescription', $itemDescription);
        $statement->bindValue(':model', $model);
        $statement->bindValue(':serialNumber', $serialNumber);
        $statement->bindValue(':purchasePrice', $purchasePrice);
        $statement->bindValue(':purchaseDate', $purchaseDate);
        $statement->bindValue(':store_id', $newStoreId);
        $statement->bindValue(':owner_id', $ownedById);
        $statement->bindValue(':room_id', $newRoomId);

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
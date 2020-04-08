<?php

if (!isset($_GET['medId'])){
    die("Error, medId not specified!");
}

$medId = htmlspecialchars($_GET['medId']);

echo "$medId\n";
echo $medId;


// require('dbConnect.php');
// $db = get_db();

// // Delete medication from table
// $deleteData = 'DELETE FROM medication WHERE medid = :medid';
// $stmt = $db->prepare($deleteData);
// $stmt->bindValue(':medid', $medId, PDO::PARAM_INT);
// $stmt->execute();

// $new_page = "medTracker-list.php";

// header("Location: $new_page");
// die();

?>
<?php

if(!isset($_GET['medId'])){
    dir("Error, medId not specified!");
}

$medId = htmlspecialchars($_GET['medId']);

// echo "$medId\n";
// echo $medId;


require('dbConnect.php');
$db = get_db();

// Delete medication from table
$deleteData = 'DELETE FROM medication WHERE medId = :medId';
$stmt = $db->prepare($deleteData);
$stmt->bindValue(':medId', $medId, PDO::PARAM_INT);
$stmt->execute();

$new_page = "medTracker-list.php";

header("Location: $new_page");
die();

?>
<?php

if (!isset($_GET['docId'])){
    die("Error, docId not specified!");
}

$medId = htmlspecialchars($_GET['docId']);

// echo "$medId\n";
// echo $medId;


require('dbConnect.php');
$db = get_db();

// Delete medication from table
$deleteData = 'DELETE FROM doctor WHERE docid = :docid';
$stmt = $db->prepare($deleteData);
$stmt->bindValue(':docid', $docId, PDO::PARAM_INT);
$stmt->execute();

$new_page = "medTracker-list.php";

header("Location: $new_page");
die();

?>
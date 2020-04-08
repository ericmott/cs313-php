<?php

$docFirstName = htmlspecialchars($_POST['docFirstName']);
$docLastName = htmlspecialchars($_POST['docLastName']);
$specialty = htmlspecialchars($_POST['specialty']);
$address_1 = htmlspecialchars($_POST['address_1']);
$address_2 = htmlspecialchars($_POST['address_2']);
$city = htmlspecialchars($_POST['city']);
$stateAbrev = htmlspecialchars($_POST['stateAbrev']);
$zip = htmlspecialchars($_POST['zip']);
$phone = htmlspecialchars($_POST['phone']);

// echo "$docFirstName\n";
// echo "$docLastName\n";
// echo "$specialty\n";
// echo "$address_1\n";
// echo "$address_2\n";
// echo "$city\n";
// echo "$stateAbrev\n";
// echo "$zip\n";
// echo $phone;

require('dbConnect.php');
$db = get_db();

// Add new doctor to table
$addData = 'INSERT INTO doctor (docFirstName, docLastName, specialty, address_1, address_2, city, stateAbrev, zip, phone) VALUES (:docFirstName, :docLastName, :specialty, :address_1, :address_2, :city, :stateAbrev, :zip, :phone)';
$stmt = $db->prepare($addData);
$stmt->bindValue(':docFirstName', $docFirstName, PDO::PARAM_STR);
$stmt->bindValue(':docLastName', $docLastName, PDO::PARAM_STR);
$stmt->bindValue(':specialty', $specialty, PDO::PARAM_STR);
$stmt->bindValue(':address_1', $address_1, PDO::PARAM_STR);
$stmt->bindValue(':address_2', $address_2, PDO::PARAM_STR);
$stmt->bindValue(':city', $city, PDO::PARAM_STR);
$stmt->bindValue(':stateAbrev', $stateAbrev, PDO::PARAM_STR);
$stmt->bindValue(':zip', $zip, PDO::PARAM_INT);
$stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
$stmt->execute();

$new_page = "medTracker-list.php";

header("Location: $new_page");
die();

?>
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

// Add new medication to table          **** Need to link medData_id and doc_id ***
$addData = 'doctor (docFirstName, docLastName, specialty, address_1, address_2, city, stateAbrev, zip, phone) VALUES (:docFirstName, :docLastName, :specialty, :address_1, :address_2, :city, :stateAbrev, :zip, :phone)';
$stmt = $db->prepare($addData);
// $stmt = $db->prepare('INSERT INTO medication (medication, dosage, frequency, startDate, endDate, reason, medData_id, doc_id) VALUES (:medication, :dosage, :frequency, :startDate, :endDate, :reason, :medData_id, :doc_id)');
$stmt->bindValue(':docFirstName', $docFirstName, PDO::PARAM_STR);
$stmt->bindValue(':docLastName', $dosdocLastNameage, PDO::PARAM_STR);
$stmt->bindValue(':specialty', $specialty, PDO::PARAM_STR);
$stmt->bindValue(':address_1', $address_1, PDO::PARAM_STR);
$stmt->bindValue(':address_2', $eaddress_2ndDate, PDO::PARAM_STR);
$stmt->bindValue(':city', $city, PDO::PARAM_STR);
$stmt->bindValue(':stateAbrev', $stateAbrev, PDO::PARAM_INT);
$stmt->bindValue(':zip', $zip, PDO::PARAM_INT);
$stmt->bindValue(':phone', $phone, PDO::PARAM_INT);
$stmt->execute();

$new_page = "medTracker-list.php";

header("Location: $new_page");
die();

INSERT INTO doctor (docFirstName, docLastName, specialty, address_1, address_2, city, stateAbrev, zip, phone) 
VALUES ('docFirst-1', 'docLast-1', 'specialty-1', 'address_1-1', 'address_2-1', 'city-1', '01', 11111, 'phone1');
?>
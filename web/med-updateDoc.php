<?php

$docId = htmlspecialchars($_POST['docId']);
$docFirstName = htmlspecialchars($_POST['docFirstName']);
$docLastName = htmlspecialchars($_POST['docLastName']);
$specialty = htmlspecialchars($_POST['specialty']);
$address_1 = htmlspecialchars($_POST['address_1']);
$address_2 = htmlspecialchars($_POST['address_2']);
$city = htmlspecialchars($_POST['city']);
$stateAbrev = htmlspecialchars($_POST['stateAbrev']);
$zip = htmlspecialchars($_POST['zip']);
$phone = htmlspecialchars($_POST['phone']);

echo "$docId\n";
echo "$docFirstName\n";
echo "$docLastName\n";
echo "$specialty\n";
echo "$address_1\n";
echo "$address_2\n";
echo "$city\n";
echo "$stateAbrev\n";
echo "$zip\n";
echo $phone;

require('dbConnect.php');
$db = get_db();

// Add new medication to table          **** Need to link medData_id and doc_id ***
$updateData = 'UPDATE doctor SET docfirstname = :docfirstname, doclastname = :doclastname, specialty = :specialty, address_1 = :address_1, address_2 = :address_2, city = :city, stateabrev = :stateabrev, zip = :zip, phone = :phone WHERE docid = :docid';
$stmt = $db->prepare($updateData);
$stmt->bindValue(':docfirstname', $docFirstName, PDO::PARAM_STR);
$stmt->bindValue(':doclastname', $docLastName, PDO::PARAM_STR);
$stmt->bindValue(':specialty', $specialty, PDO::PARAM_STR);
$stmt->bindValue(':address_1', $address_1, PDO::PARAM_STR);
$stmt->bindValue(':address_2', $address_2, PDO::PARAM_STR);
$stmt->bindValue(':city', $city, PDO::PARAM_STR);
$stmt->bindValue(':stateabrev', $stateAbrev, PDO::PARAM_STR);
$stmt->bindValue(':zip', $zip, PDO::PARAM_INT);
$stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
$stmt->bindValue(':docid', $docId, PDO::PARAM_INT);
$stmt->execute();

$new_page = "medTracker-list.php";

header("Location: $new_page");
die();
?>
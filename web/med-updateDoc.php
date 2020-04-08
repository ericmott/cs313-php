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


?>
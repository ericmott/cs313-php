<?php
if (!isset($_GET['docId'])){
    die("Error, doc ID not set");
}

$passDocId = htmlspecialchars($_GET['docId']);
$trimDocId = trim($passMedId);

require('dbConnect.php');
$db = get_db();

// Select all medication details
$query = "SELECT docid, docfirstname, doclastname, specialty, address_1, address_2, city, stateabrev, zip, phone FROM doctor WHERE docid = :id";
$stmt = $db->prepare($query);
$stmt->bindValue(':id', $passDocId, PDO::PARAM_INT);
$stmt->execute();
$doc = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $a = trim($name); 
// $query = "SELECT surname FROM employee WHERE name= '" . $a . "';"; 
// $query = "SELECT surname FROM emploee WHERE name= '" . $name . "';";
// $query = sprintf("SELECT surname FROM emploee WHERE name = '%s'", pg_escape_string($name));

// $medId = $med['medId'];
// $medication = $med['medication'];
// $dosage = $med['dosage'];
// $frequency = $med['frequency'];
// $startDate = $med['startDate'];
// $reason = $med['reason'];
// $medData_id = $med['medData_id'];
// $doc_id = $med['doc_id'];

var_dump($doc);
var_dump($passDocId);
var_dump($trimDocId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Details</title>
</head>
<body>
    <h1>Welcome to the med-docDetails page!!!</h1>
</body>
</html>
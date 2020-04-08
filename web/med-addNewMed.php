<?php

$medication = htmlspecialchars($_POST['medication']);
$dosage = htmlspecialchars($_POST['dosage']);
$frequency = htmlspecialchars($_POST['frequency']);
$startDate = htmlspecialchars($_POST['startDate']);
$endDate = htmlspecialchars($_POST['endDate']);
$reason = htmlspecialchars($_POST['reason']);

$medData_id = 1; // *********************** need to link ******************
$doc_id = 1; // *********************** need to link ******************

// echo "$medId\n";
// echo "$medication\n";
// echo "$dosage\n";
// echo "$frequency\n";
// echo "$startDate\n";
// echo "$endDate\n";
// echo $reason;

require('dbConnect.php');
$db = get_db();

// Add new medication to table          **** Need to link medData_id and doc_id ***
$addMed = 'INSERT INTO medication (medication, dosage, frequency, startDate, endDate, reason, medData_id, doc_id) VALUES (:medication, :dosage, :frequency, :startDate, :endDate, :reason, :medData_id, :doc_id)';
$stmt = $db->prepare("$addMed");
// $stmt = $db->prepare('INSERT INTO medication (medication, dosage, frequency, startDate, endDate, reason, medData_id, doc_id) VALUES (:medication, :dosage, :frequency, :startDate, :endDate, :reason, :medData_id, :doc_id)');
$stmt->bindValue(':medication', $medication, PDO::PARAM_STR);
$stmt->bindValue(':dosage', $dosage, PDO::PARAM_STR);
$stmt->bindValue(':frequency', $frequency, PDO::PARAM_STR);
$stmt->bindValue(':startDate', $startDate, PDO::PARAM_STR);
$stmt->bindValue(':endDate', $endDate, PDO::PARAM_STR);
$stmt->bindValue(':reason', $reason, PDO::PARAM_STR);
$stmt->bindValue(':medData_id', $medData_id, PDO::PARAM_INT);
$stmt->bindValue(':doc_id', $doc_id, PDO::PARAM_INT);
$stmt->execute();

$new_page = "medTracker-list.php";

header("Location: $new_page");
die();
?>
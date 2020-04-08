<?php

$medId = htmlspecialchars($_POST['medId']);
$medication = htmlspecialchars($_POST['medication']);
$dosage = htmlspecialchars($_POST['dosage']);
$frequency = htmlspecialchars($_POST['frequency']);
$startDate = htmlspecialchars($_POST['startDate']);
$endDate = htmlspecialchars($_POST['endDate']);
$reason = htmlspecialchars($_POST['reason']);

echo "$medId\n";
echo "$medication\n";
echo "$dosage\n";
echo "$frequency\n";
echo "$startDate\n";
echo "$endDate\n";
echo $reason;

require('dbConnect.php');
$db = get_db();

// Add new medication to table          **** Need to link medData_id and doc_id ***
$addData = 'UPDATE medication SET medication = :medication, dosage = :dosage, frequency = :frequency, startDate = :startDate, endDate = :endDate, reason = :reason, medData_id = :medData_id, doc_id = :doc_id WHERE medid = :medid';
$stmt = $db->prepare($addData);
$stmt->bindValue(':medication', $medication, PDO::PARAM_STR);
$stmt->bindValue(':dosage', $dosage, PDO::PARAM_STR);
$stmt->bindValue(':frequency', $frequency, PDO::PARAM_STR);
$stmt->bindValue(':startDate', $startDate, PDO::PARAM_STR);
$stmt->bindValue(':endDate', $endDate, PDO::PARAM_STR);
$stmt->bindValue(':reason', $reason, PDO::PARAM_STR);
$stmt->bindValue(':medData_id', $medData_id, PDO::PARAM_INT);
$stmt->bindValue(':doc_id', $doc_id, PDO::PARAM_INT);
$stmt->bindValue(':medid', $medId, PDO::PARAM_INT);
$stmt->execute();

$new_page = "medTracker-list.php";

header("Location: $new_page");
die();
?>
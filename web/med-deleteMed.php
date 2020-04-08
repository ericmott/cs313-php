<?php

if(!isset($_GET['medId'])){
    dir("Error, medId not specified!");
}

$medId = htmlspecialchars($_GET['medId']);




echo "$medId\n";
echo $medId;


// require('dbConnect.php');
// $db = get_db();

// // Add new medication to table          **** Need to link medData_id and doc_id ***
// $addData = 'INSERT INTO medication (medication, dosage, frequency, startDate, endDate, reason, medData_id, doc_id) VALUES (:medication, :dosage, :frequency, :startDate, :endDate, :reason, :medData_id, :doc_id)';
// $stmt = $db->prepare($addData);
// // $stmt = $db->prepare('INSERT INTO medication (medication, dosage, frequency, startDate, endDate, reason, medData_id, doc_id) VALUES (:medication, :dosage, :frequency, :startDate, :endDate, :reason, :medData_id, :doc_id)');
// $stmt->bindValue(':medication', $medication, PDO::PARAM_STR);
// $stmt->bindValue(':dosage', $dosage, PDO::PARAM_STR);
// $stmt->bindValue(':frequency', $frequency, PDO::PARAM_STR);
// $stmt->bindValue(':startDate', $startDate, PDO::PARAM_STR);
// $stmt->bindValue(':endDate', $endDate, PDO::PARAM_STR);
// $stmt->bindValue(':reason', $reason, PDO::PARAM_STR);
// $stmt->bindValue(':medData_id', $medData_id, PDO::PARAM_INT);
// $stmt->bindValue(':doc_id', $doc_id, PDO::PARAM_INT);
// $stmt->execute();

// $new_page = "medTracker-list.php";

// header("Location: $new_page");
// die();
?>
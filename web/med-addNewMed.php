<?php

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

?>
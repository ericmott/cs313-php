<?php

$medId = htmlspecialchars($_POST['medId']);
$medication = htmlspecialchars($_POST['medication']);
$dosage = htmlspecialchars($_POST['dosage']);
$frequency = htmlspecialchars($_POST['frequency']);
$startDate = htmlspecialchars($_POST['startDate']);
$endDate = htmlspecialchars($_POST['endDate']);
$reason = htmlspecialchars($_POST['reason']);

echo "$medication\n";
echo $reason;

echo var_dump($medication);
?>
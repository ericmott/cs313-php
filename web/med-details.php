<?php
if (!isset($_GET['medId'])){
    die("Error, med ID not set");
}

$passMedId = htmlspecialchars($_GET['medId']);
$trimMedId = trim($passMedId);

require('dbConnect.php');
$db = get_db();

// Select all medication details
$query = "SELECT medId, medication, dosage, frequency, startDate, reason, medData_id, doc_id FROM medication WHERE medid = $passMedId";
$stmt = $db->prepare($query);
$stmt->execute();
$med = $stmt->fetchAll(PDO::FETCH_ASSOC);

$medId = $med['medId'];
$medication = $med['medication'];
$dosage = $med['dosage'];
$frequency = $med['frequency'];
$startDate = $med['startDate'];
$endDate = $med['endDate'];
$reason = $med['reason'];
$medData_id = $med['medData_id'];
$doc_id = $med['doc_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medication Details</title>
</head>
<body>
    <h1>Medication Details</h1>
    <div>
        <form action=""></form>
        <div>
                    <label for="medication">Medication: </label>
                    <input type="text" id="medication" value="<?php $medication ?>"><br>
                    <label for="dosage">Dosage: </label>
                    <input type="text" id="dosage" value="<?php $dosage ?>"><br>
                    <label for="startDate">Frequency: </label>
                    <input type="date" id="frequency" value="<?php $frequency ?>"><br>
                    <label for="startDate">Start Date: </label>
                    <input type="date" id="startDate" value="<?php $startDate ?>"><br>
                    <label for="endDate">End Date: </label>
                    <input type="date" id="endDate" value="<?php $endDate ?>"><br>
                    <label for="docName">Reason: </label>
                    <input type="text" id="reason" value="<?php $reason ?>"><br>
                </div>
    </div>
</body>
</html>
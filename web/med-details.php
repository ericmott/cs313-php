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

$medId = $med[0]['medId'];
$medication = $med[0]['medication'];
$dosage = $med[0]['dosage'];
$frequency = $med[0]['frequency'];
$startDate = $med[0]['startDate'];
$endDate = $med[0]['endDate'];
$reason = $med[0]['reason'];
$medData_id = $med[0]['medData_id'];
$doc_id = $med[0]['doc_id'];

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
    <p>med: <?php echo $medication ?></p>
    <div>
        <form action=""></form>
        <div>
                    <label for="medication">Medication: </label>
                    <input type="text" id="medication" value="<?php echo $medication ?>"><br>
                    <label for="dosage">Dosage: </label>
                    <input type="text" id="dosage" value="<?php echo $dosage ?>"><br>
                    <label for="startDate">Frequency: </label>
                    <input type="date" id="frequency" value="<?php echo $frequency ?>"><br>
                    <label for="startDate">Start Date: </label>
                    <input type="date" id="startDate" value="<?php echo $startDate ?>"><br>
                    <label for="endDate">End Date: </label>
                    <input type="date" id="endDate" value="<?php echo $endDate ?>"><br>
                    <label for="docName">Reason: </label>
                    <input type="text" id="reason" value="<?php echo $reason ?>"><br>
                </div>
    </div>
</body>
</html>
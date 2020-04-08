<?php
if (!isset($_GET['medId'])){
    die("Error, med ID not set");
}

$passMedId = htmlspecialchars($_GET['medId']);
$trimMedId = trim($passMedId);

require('dbConnect.php');
$db = get_db();

// Select all medication details
$query = "SELECT medId, medication, dosage, frequency, startdate, enddate, reason, meddata_id, doc_id FROM medication WHERE medid = $passMedId";
$stmt = $db->prepare($query);
$stmt->execute();
$med = $stmt->fetchAll(PDO::FETCH_ASSOC);

$medId = $med[0]['medid'];
$medication = $med[0]['medication'];
$dosage = $med[0]['dosage'];
$frequency = $med[0]['frequency'];
$startDate = $med[0]['startdate'];
$endDate = $med[0]['enddate'];
$reason = $med[0]['reason'];
$medData_id = $med[0]['meddata_id'];
$doc_id = $med[0]['doc_id'];

$med_id = $medId;
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
        <form method="POST" action="med-updateMed.php">
        <div>
            <input type="hidden" name="medId" value="<?php echo $medId; ?>">
            <label for="medication">Medication: </label>
            <input type="text" id="medication" name="medication" value="<?php echo $medication; ?>"><br>
            <label for="dosage">Dosage: </label>
            <input type="text" id="dosage" name="dosage" value="<?php echo $dosage; ?>"><br>
            <label for="frequency">Frequency: </label>
            <input type="text" id="frequency" name="frequency" value="<?php echo $frequency; ?>"><br>
            <label for="startDate">Start Date: </label>
            <input type="date" id="startDate" name="startDate" value="<?php echo $startDate; ?>"><br>
            <label for="endDate">End Date: </label>
            <input type="date" id="endDate" name="endDate" value="<?php echo $endDate; ?>"><br>
            <label for="docName">Reason: </label>
            <input type="text" id="reason" name="reason" value="<?php echo $reason; ?>"><br>
        </div>
        <div>
            <input type="submit" name="" id="" value="Update Medication">
            <a href='medTracker-list.php'><input type="button" name="" id="" value="Return to Med List"></a>
            <a href='med-deleteMed.php?medId=$med_id'><input type="button" name="" id="" value="Delete Medication"></a>
        </div>
        </form>
    </div>
</body>
</html>
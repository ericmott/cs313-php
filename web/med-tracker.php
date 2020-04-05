<?php
require('dbConnect.php');
$db = get_db();

// // get data from item, doctor, and med_data tables
// $query = 'SELECT medId, medication, dosage, frequency, startDate, endDate, reason, medName, brandName, genericName, medDescription, docFirstName, docLastName, specialty, address_1, address_2, city, stateAbrev, zip, phone, medData_id, doc_id FROM medication
// LEFT OUTER JOIN med_data ON (medication.medData_id = med_data.medDataId)
// LEFT OUTER JOIN doctor ON (medication.doc_id = doctor.docId)';
// $stmt = $db->prepare($query);
// $stmt->execute();
// $meds = $stmt->fetchAll(PDO::FETCH_ASSOC);

// get data from item, doctor, and med_data tables
$query = 'SELECT medId, medication, dosage, frequency, startDate, endDate, reason, medData_id, doc_id, medName, brandName, genericName, medDescription, docFirstName, docLastName, specialty, address_1, address_2, city, stateAbrev, zip, phone FROM medication
LEFT OUTER JOIN med_data ON (medication.medData_id = med_data.medDataId)
LEFT OUTER JOIN doctor ON (medication.doc_id = doctor.docId)';
$stmt = $db->prepare($query);
$stmt->execute();
$meds = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Medication Tracker - Master List</title>
    <link rel="stylesheet" href="cs313-styles.css">
    <link rel="stylesheet" href="cs313MedTracker-styles.css">
</head>

<body>
    <header>
        <h1>Medication Tracker</h1>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
            </ul>
        </nav>
        <hr>
        <h1>Medication List</h1>
        <hr>
    </header>

    <main>
        <div class="text-main-gry-blk">
        <?php
        foreach ($meds as $med) {
            echo $medId = $med['medId'];
            "<br>" echo $medication = $med['medication'];
            "<br>" echo $dosage = $med['dosage'];
            "<br>" echo $frequency = $med['frequency'];
            "<br>" echo $startDate = $med['startDate'];
            "<br>" echo $endDate = $med['endDate'];
            "<br>" echo $reason = $med['reason'];
            "<br>" echo $medData_id = $med['medData_id'];
            "<br>" echo $doc_id = $med['doc_id'];
            "<br>" echo $medName = $med['medName'];
            "<br>" echo $brandName = $med['brandName'];
            "<br>" echo $genericName = $med['genericName'];
            "<br>" echo $medDescription = $med['medDescription'];
            "<br>" echo $docFirstName = $med['docFirstName'];
            "<br>" echo $docLastName = $med['docLastName'];
            "<br>" echo $specialty = $med['specialty'];
            "<br>" echo $address_1 = $med['address_1'];
            "<br>" echo $address_2 = $med['address_2'];
            "<br>" echo $city = $med['city'];
            "<br>" echo $stateAbrev = $med['stateAbrev'];
            "<br>" echo $zip = $med['zip'];
            "<br>" echo $phone = $med['phone'];
            
            echo "<li>Medication: $medication | Dosage: $dosage | Frequency: $frequency | Reason: $reason | Doctor: $docLastName | Doc ID: $doc_id";
        }
        ?>
        </div>
        <div class="container-1">
            <!-- Add Item Button -->
            <form action="tracker-add.html">
                <button class="button-std" type="submit" title="Add New Item">Add Item</button>
            </form>
        </div>

    </main>

    <footer>
        <div class="blu-wht">
            <p style="margin-left:10px;">&copy; Eric Mott, 2020</p>
        </div>
    </footer>

    <script src="prove02-script.js"></script>

</body>

</html>
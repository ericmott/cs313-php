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
$query = 'SELECT medId, medication, dosage, frequency, reason, docLastName, doc_id FROM medication
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
            $medId = $med['medId'];
            $medication = $med['medication'];
            $dosage = $med['dosage'];
            $frequency = $med['frequency'];
            // $startDate = $med['startDate'];
            // $endDate = $med['endDate'];
            $reason = $med['reason'];
            // $medName = $med['medName'];
            // $brandName = $med['brandName'];
            // $genericName = $med['genericName'];
            // $medDescription = $med['medDescription'];
            // $docFirstName = $med['docFirstName'];
            $docLastName = $med['doctor.docLastName'];
            // $specialty = $med['specialty'];
            // $address_1 = $med['address_1'];
            // $address_2 = $med['address_2'];
            // $city = $med['city'];
            // $stateAbrev = $med['stateAbrev'];
            // $zip = $med['zip'];
            // $phone = $med['phone'];
            // $medData_id = $med['medData_id'];
            $doc_id = $med['doc_id'];

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
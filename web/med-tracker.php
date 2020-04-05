<?php
require('dbConnect.php');
$db = get_db();

// From the reading:
// $stmt = $db->prepare('SELECT * FROM table WHERE id=:id AND name=:name');
// $stmt->bindValue(':id', $id, PDO::PARAM_INT);
// $stmt->bindValue(':name', $name, PDO::PARAM_STR);
// $stmt->execute();
// $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// // Get data from item table
// $query = 'SELECT medId, medication, dosage, frequency, startDate, endDate, reason, medData_id, doc_id FROM medication
//      LEFT OUTER JOIN med_date ON (medication.medData_id = med_data.medDataId)
//      LEFT OUTER JOIN doctor ON (medication.doc_id = doctor.docId)';
// $stmt = $db->prepare($query);
// $stmt->execute();
// $meds = $stmt->fetchAll(PDO::FETCH_ASSOC);

// get data from item, doctor, and med_data tables
$query = 'SELECT medId, medication, dosage, frequency, startDate, endDate, reason, medData_id, doc_id FROM medication
LEFT OUTER JOIN med_data ON (medication.medData_id = med_data.medDataId)
LEFT OUTER JOIN doctor ON (medication.doc_id = doctor.docId';
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
        // foreach ($db->('SELECT itemDescription, model, serialNumber, purchasePrice, purchaseDate FROM item') as $row) {
        //     echo "<div>" "Item: " . $row["itemDescription"] . " | Model: " . $row["model"] . " | S/N: " . $row["serialNumber"] . " | Purchase Price $" . $row["purchasePrice"] . " | Date Purchased: " . $row["purchaseDate"];
        //     echo '<br/>';
        // }
        foreach ($meds as $med) {
            $medId = $med['medId'];
            $medication = $med['medication'];
            $dosage = $med['dosage'];
            $frequency = $med['frequency'];
            $startDate = $med['startDate'];
            $endDate = $med['endDate'];
            $reason = $med['reason'];
            $medData_id = $med['medData_id'];
            $doc_id = $med['doc_id'];
            // $genericName = $med['genericName'];
            // $docLastName = $med['docLastName'];
            

            echo "<li>Medication: $medication | Dosage: $dosage | Frequency: $frequency | Start Date: $startDate | End Date: $endDate | Reason: $reason | Med ID: $medData_id | Doc ID: $doc_id";
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
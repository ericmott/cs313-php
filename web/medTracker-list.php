<?php
require('dbConnect.php');
$db = get_db();

// Select medID, medication, dosage, frequency, reason, medData_id, doc_id FROM medication
$query = 'Select medID, medication, dosage, frequency, reason, medData_id, doc_id FROM medication';
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
    <link rel="stylesheet" href="cs313-styles.css" class="rel">
    <link rel="stylesheet" href="cs313MedTracker-styles.css" class="rel">
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
        <div>
            <?php
            echo "<table><tr><th>Medication</th><th>Dosage</th><th>Frequency</th><th>Reason</th></tr>";
            foreach ($meds as $med) {
                $medId = $med['medId'];
                $medication = $med['medication'];
                $dosage = $med['dosage'];
                $frequency = $med['frequency'];
                $reason = $med['reason'];
                $medData_id = $med['medData_id'];
                $doc_id = $med['doc_id'];

                echo "<tr><td><a href='med-details.php?medId=$medId'>$medication</a></td><td>$dosage</td><td>$frequency</td><td>$reason</td></tr>";
            }
            ?>
        </div>
        <div class="container-1">
            <!-- Add Medication Button -->
            <form action="add-medication.php">
                <button class="button-std" type="submit" title="Add New Medication">Add Medication</button>
            </form>
        </div>
    </main>

    <footer>
        <div class="blu-wht">
            <p style="margin-left:10px;">&copy; Eric Mott, 2020</p>
        </div>
    </footer>
    
</body>
</html>
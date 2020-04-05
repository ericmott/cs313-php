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
// $query = 'SELECT medId, medication, dosage, frequency, startDate, endDate, reason, medInfo, doc_id FROM medication
//      LEFT OUTER JOIN doctor ON (medication.medData_id = med_data.medDataId)
//      LEFT OUTER JOIN room ON (medication.doc_id = doctor.docId)';
// $stmt = $db->prepare($query);
// $stmt->execute();
// $meds = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
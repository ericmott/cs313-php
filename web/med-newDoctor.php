<?php
// if (!isset($_GET['medId'])){
//     die("Error, med ID not set");
// }

// $passMedId = htmlspecialchars($_GET['medId']);
// $trimMedId = trim($passMedId);

// require('dbConnect.php');
// $db = get_db();

// // Select all medication details
// $query = "SELECT medId, medication, dosage, frequency, startDate, reason, medData_id, doc_id FROM medication WHERE medid = $passMedId";
// $stmt = $db->prepare($query);
// $stmt->execute();
// $med = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $medId = $med[0]['medid'];
// $medication = $med[0]['medication'];
// $dosage = $med[0]['dosage'];
// $frequency = $med[0]['frequency'];
// $startDate = $med[0]['startDate'];
// $endDate = $med[0]['endDate'];
// $reason = $med[0]['reason'];
// $medData_id = $med[0]['medData_id'];
// $doc_id = $med[0]['doc_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Doctor</title>
</head>
<body>
    <h1>Add Doctor</h1>
    <div>
        <form method="POST" action="med-addNewDoc.php">
        <div>
            <label for="docFirstName">Doctor's first name: </label>
            <input type="text" id="docFirstName" name="docFirstName" value="" placeholder="First Name"><br>
            <label for="docLastName">Doctor's last name: </label>
            <input type="text" id="docLastName" name="docLastName" value="" placeholder="Last Name"><br>
            <label for="specialty">Specialty: </label>
            <input type="text" id="specialty" name="specialty" value="" placeholder="Family Medicine"><br>
            <label for="address_1">Address: </label>
            <input type="text" id="address_1" name="address_1" value="" placeholder="Address"><br>
            <label for="address_2">Address: </label>
            <input type="text" id="address_2" name="address_2" value="" placeholder="Address"><br>
            <label for="city">City: </label>
            <input type="text" id="city" name="city" value="" placeholder="City"><br>
            <label for="stateAbrev">State: </label>
            <input type="text" id="stateAbrev" name="stateAbrev" maxlength=2 value="" placeholder="CA"><br>
            <label for="zip">Zip Code: </label>
            <input type="number" id="zip" name="zip" maxlength=5 value="" placeholder="00000"><br>
            <label for="phone">Phone: </label>
            <input type="text" id="phone" name="phone" value="" placeholder="123-456-7890"><br>
        </div>
        <div>
            <input type="submit" name="" id="" value="Add Doctor">
            <a href='medTracker-list.php'><input type="button" name="" id="" value="Return to Med List"></a>
        </div>
        </form>
        
    </div>
</body>
</html>
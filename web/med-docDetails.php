<?php
if (!isset($_GET['docId'])){
    die("Error, doc ID not set");
}

$passDocId = htmlspecialchars($_GET['docId']);
$trimDocId = trim($passDocId);

require('dbConnect.php');
$db = get_db();

// Select all doctor details
$query = "SELECT docid, docfirstname, doclastname, specialty, address_1, address_2, city, stateabrev, zip, phone FROM doctor WHERE docid = $passDocId";
$stmt = $db->prepare($query);
$stmt->execute();
$doc = $stmt->fetchAll(PDO::FETCH_ASSOC);

$docId = $doc[0]['docid'];
$docFirstName = $doc[0]['docfirstname'];
$docLastName = $doc[0]['doclastname'];
$specialty = $doc[0]['specialty'];
$address_1 = $doc[0]['address_1'];
$address_2 = $doc[0]['address_2'];
$city = $doc[0]['city'];
$stateAbrev = $doc[0]['stateabrev'];
$zip = $doc[0]['zip'];
$phone = $doc[0]['phone'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Details</title>
</head>
<body>
    <h1>Doctor Details</h1>
    <div>
        <form method="POST" action="med-updateDoc.php">
        <div>
            <input type="hidden" name="docId" value="<?php echo $docId; ?>">
            <label for="docFirstName">Doctor's first name: </label>
            <input type="text" id="docFirstName" name="docFirstName" value="<?php echo $docFirstName; ?>"><br>
            <label for="docLastName">Doctor's last name: </label>
            <input type="text" id="docLastName" name="docLastName" value="<?php echo $docLastName; ?>"><br>
            <label for="specialty">Frequency: </label>
            <input type="text" id="specialty" name="specialty" value="<?php echo $specialty; ?>"><br>
            <label for="address_1">Address: </label>
            <input type="text" id="address_1" name="address_1" value="<?php echo $address_1; ?>"><br>
            <label for="address_2">Address: </label>
            <input type="text" id="address_2" name="address_2" value="<?php echo $address_2; ?>"><br>
            <label for="city">City: </label>
            <input type="text" id="city" name="city" value="<?php echo $city; ?>"><br>
            <label for="stateAbrev">State: </label>
            <input type="text" id="stateAbrev" name="stateAbrev" maxlength=2 value="<?php echo $stateAbrev; ?>"><br>
            <label for="zip">Zip Code: </label>
            <input type="number" id="zip" name="zip" maxlength=5 value="<?php echo $zip; ?>"><br>
            <label for="phone">Phone: </label>
            <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>"><br>
        </div>
        <div>
            <input type="submit" name="" id="" value="Update Doctor">
            <a href='medTracker-list.php'><input type="button" name="" id="" value="Return to Med List"></a>
            <?php echo "<a href='med-deleteDoc.php?docId=$docId'><input type='button' name='' id='' value='Delete Doctor'></a>"; ?>
        </div>
        </form>
    </div>
</body>
</html>
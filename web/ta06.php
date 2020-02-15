<?php
require('dbConnect.php');
$db = get_db();


// Get data from scriptures table
$query = 'SELECT id, book, chapter, verse, content FROM scriptures';
$stmt = $db->prepare($query);
$stmt->execute();
$scriptures = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scripture Resources</title>
</head>
<body>
<h1>Scripture Resources</h1>

<div>
<form action="ta06-partB.php" method='post'>

<input type="text" name="book">
<input type="text" name="chapter">
<input type="text" name="verse">
<textarea name="content" id="content"></textarea>
<input type="checkbox" name="topic[]" value="faith" />Faith<br />
<input type="checkbox" name="topic[]" value="sacrifice" />Sacrifice<br />
<input type="checkbox" name="topic[]" value="sharity" />Charity<br />
<input type="submit" name="formSubmit" value="Add Scripture" />



</form>
</div>

<?php

// foreach ($scriptures as $scripture) {
//   $id = $scripture['id'];
//   $book = $scripture['book'];
//   $chapter = $scripture['chapter'];
//   $verse = $scripture['verse'];
//   $content = $scripture['content'];

//   echo "<li>$book $chapter:$verse $content";


}
?>
    
</body>
</html>
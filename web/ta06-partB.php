<?php
require('dbConnect.php');
$db = get_db();

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

<!-- <div>
<form action="ta06-partB.php" method='post'>

<input type="text" name="book">
<input type="text" name="chapter">
<input type="text" name="verse">
<textarea name="content" id="content"></textarea>
<input type="checkbox" name="faith" value="Faith" />
<input type="checkbox" name="sacrifice" value="Sacrifice" />
<input type="checkbox" name="charity" value="Charity" />
<input type="submit" name="formSubmit" value="Add Scripture" />
</form>
</div> -->

<?php

// foreach ($scriptures as $scripture) {
//   $id = $scripture['id'];
//   $book = $scripture['book'];
//   $chapter = $scripture['chapter'];
//   $verse = $scripture['verse'];
//   $content = $scripture['content'];

//   echo "<li>$book $chapter:$verse $content";
$book = htmlspecialchars($_POST['book']);
    $chapter = htmlspecialchars($_POST['chapter']);
    $verse = htmlspecialchars($_POST['verse']);
    $content          = htmlspecialchars($_POST['content']);
    $topic = $_POST['topic'];
  
$stmt = $db->prepare('INSERT INTO scriptures(book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content);');

$stmt->bindValue(':book', $book, PDO::PARAM_STR);
$stmt->bindValue(':chapter', $chapter, PDO::PARAM_INT);
$stmt->bindValue(':verse', $verse, PDO::PARAM_INT);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->execute();


$stmt = $db->prepare('INSERT INTO topic(name) VALUES (:name);');
$stmt->bindValue(':name', $topic, PDO::PARAM_STR);
$stmt->execute();
}
?>
    
</body>
</html>


<?php

$course_id = htmlspecialchars($_POST['course_id']);
$content = htmlspecialchars($_POST['note_content']);

require('dbConnect.php');
$db = get_db();

$stmt = $db->prepare('INSERT INTO note(course_id, content) VALUES (:course_id, :content);');
$stmt->bindValue(':course_id', $course_id, PDO::PARAM_INT);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->execute();

$new_page = "course_notes.php?course_id=$course_id";

header("Location: $new_page");
die();

?>
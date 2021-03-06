<?php
// require('dbConnect.php');
// $db = get_db();

try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

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

<?php
// foreach ($db->query('SELECT id, book, chapter, verse, content FROM scriptures') as $row) {
//     echo "<div><b>" . $row["book"] . " " . $row["chapter"] . ":" . $row["verse"] . " - " . $row["content"] . "</b><div>";
//     echo '<br/>';
// }
foreach ($scriptures as $scripture) {
  $id = $scripture['id'];
  $book = $scripture['book'];
  $chapter = $scripture['chapter'];
  $verse = $scripture['verse'];
  $content = $scripture['content'];

  echo "<li>$book $chapter:$verse $content";
}
?>
    
</body>
</html>
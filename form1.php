<?php
require_once __DIR__ ."/vendor/autoload.php";
$collection = (new MongoDB\Client)->mongodb->mongodb;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $publisher = $_GET['publisher'];
    $literate = "Book";
    $cursor = $collection->find( 
        [
            'publisher' => $publisher,
            'literate' => $literate
        ]
    );
    $result = "Представленная по запросу информация: <ul>";
    foreach ($cursor as $document) {
        $title = $document['title'];
        $author = $document['author'];
        $publisher = $document['publisher'];
        $year =  $document['year'];
        $ISBN = $document['ISBN'];
        $result .= "<li>Книга: $title, автор: $author, издательство: $publisher, год выпуска:  $publisher, ISBN $year </li>";
    }
    $result .= "</ul>";
    echo $result;
    echo "<script> localStorage.setItem('$publisher', '$result'); </script>";
?>
</body>
</html>
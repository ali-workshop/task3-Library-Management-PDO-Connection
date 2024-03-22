<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Book Entry Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="form-container">
        <h2>Library Book Entry</h2>
        <form id="bookForm" action="" method="post">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="author">AuthorName:</label>
                <input type="text" id="author" name="author" required>
            </div>
            <div class="form-group">
                <label for="publisher">Publisher:</label>
                <input type="text" id="publisher" name="publisher">
            </div>
            <div class="form-group">
                <label for="genre">Genre:</label>
                <input type="text" id="genre" name="genre">
            </div>
            <div class="form-group">
                <label for="page_count">PageCount:</label>
                <input type="number" id="page_count" name="page_count" min="0">
            </div>
            <div class="form-group">
                <label for="language">Language:</label>
                <input type="text" id="language" name="language">
            </div>
            <div class="form-group">
                <label for="summary">Summary:</label>
                <input type="text" id="summary" name="summary">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price">
            </div>
            <div class="form-group">
                <label for="publicationYear">Publication Year:</label>
                <input type="date" id="publicationYear" name="publicationYear">
            </div>
            <div class="form-group">
                <button type="submit" name="submit">ADD BOOK</button>

            </div>
        </form>
    </div>
</body>

</html>
<?php
if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $publisher = $_POST["publisher"];
    $genre = $_POST["genre"];
    $page_count = $_POST["page_count"];
    $language = $_POST["language"];
    $summary = $_POST["summary"];
    $price = $_POST["price"];
    $publication_year = $_POST["publicationYear"];
    $info = [$title, $author, $publisher, $publication_year, $genre, $page_count, $language, $summary, $price];
    try {
        require_once "./data_connection.inc.php";
        require_once "./Book.php";
        $query = "INSERT INTO books (title,author,publisher,publicationYear,genre,pageCounte,booklanguage,summary,price) 
 VALUES (?,?,?,?,?,?,?,?,?);";
        // for demostrate the oop .In the lines below i insert object into the data
// $book=new Book($title,$author,$publisher,$publication_year,$genre,$page_count,$language,$summary,$price);
// $jbook=json_encode($book); or another way to achive this $serializedBook = serialize($book); 
// $query="INSERT INTO books(book) VALUES ('$jbook');";# or $$query="INSERT INTO books(book) VALUES ('$serializedBook');";
// in the case that  i want to get(retrive) the object from the data 
// $unserialized = unserialize($serializedBook);and then deal wiht is as an normal object.
//in this task i will use the inforamtion from the FORM wihtout encapsulate in an object and with encapsulte them wihtin book object.    

        $stmt = $pdo->prepare($query);
        $stmt->execute($info);
        header("Location:view_books.php");
        $pdo = null;
        $stmt = null;

    } catch (Exception $error) {

        echo "the query is field " . $error->getMessage();

    }



}
?>
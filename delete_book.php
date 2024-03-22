<?php
if (!empty($_GET)) {
    $id = $_GET["id"];

    try {
        require_once "./data_connection.inc.php";
        $query = "DELETE FROM books WHERE id=:id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        header("Location:./view_books.php");
        $pdo = null;
        $stmt = null;




    } catch (Exception $error) {

        echo "the query is field " . $error->getMessage();

    }

} else {

    ?>

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
                    <label for="language">Language:</label>
                    <input type="text" id="language" name="language">

                    <div class="form-group">
                        <label for="publicationYear">Publication Year:</label>
                        <input type="date" id="publicationYear" name="publicationYear">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit">DELETE BOOK</button>

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
        $language = $_POST["language"];
        $publication_year = $_POST["publicationYear"];
        try {
            require_once "./data_connection.inc.php";
            $query = "DELETE FROM books WHERE title=:title AND author=:author AND  publisher=:publisher AND  
publicationYear=:publicationYear AND   bookLanguage=:booklanguage";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':author', $author);
            $stmt->bindParam(':publisher', $publisher);
            $stmt->bindParam(':publicationYear', $publication_year);
            $stmt->bindParam(':booklanguage', $language);

            $stmt->execute();

            $pdo = null;
            $stmt = null;




        } catch (Exception $error) {

            echo "the query is field " . $error->getMessage();

        }








    }
} ?>
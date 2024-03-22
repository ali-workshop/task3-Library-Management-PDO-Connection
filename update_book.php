<?php

if (!empty($_GET)) {
    $id = $_GET["id"];
    require_once "./data_connection.inc.php";
    $query = "SELECT * FROM books";

    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($data);
    $ids_from_data = array();
    for ($i = 0; $i < sizeof($data); ++$i) {
        $ids_from_data[] = $data[$i]["id"];
    }

    if (!in_array($id, $ids_from_data)) {
        echo "There is no Sample in this data wiht this ID pls try again.............";

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
                        <button type="submit" name="submit">UPDATE BOOK</button>

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
                $query = "UPDATE  books SET title=:title, author=:author, publisher=:publisher, publicationYear=:publicationYear,
     genre=:genre, pageCounte=:pageCounte, bookLanguage=:booklanguage, summary=:summary, price=:price WHERE id=$id;";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':author', $author);
                $stmt->bindParam(':publisher', $publisher);
                $stmt->bindParam(':publicationYear', $publication_year);
                $stmt->bindParam(':genre', $genre);
                $stmt->bindParam(':pageCounte', $page_count);
                $stmt->bindParam(':booklanguage', $language);
                $stmt->bindParam(':summary', $summary);
                $stmt->bindParam(':price', $price);

                $stmt->execute();

                $pdo = null;
                $stmt = null;




            } catch (Exception $error) {

                echo "the query is field" . $error->getMessage();

            }


        }



    }




} else {
    ?>


    <?php
    // echo "iam  not in get";
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
                    <button type="submit" name="submit">UPDATE BOOK</button>

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
            $query = "UPDATE  books SET title=:title, author=:author, publisher=:publisher, publicationYear=:publicationYear,
 genre=:genre, pageCounte=:pageCounte, bookLanguage=:booklanguage, summary=:summary, price=:price WHERE id=15 ;";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':author', $author);
            $stmt->bindParam(':publisher', $publisher);
            $stmt->bindParam(':publicationYear', $publication_year);
            $stmt->bindParam(':genre', $genre);
            $stmt->bindParam(':pageCounte', $page_count);
            $stmt->bindParam(':booklanguage', $language);
            $stmt->bindParam(':summary', $summary);
            $stmt->bindParam(':price', $price);

            $stmt->execute();

            $pdo = null;
            $stmt = null;




        } catch (Exception $error) {

            echo "the query is field" . $error->getMessage();

        }








    }

} ?>
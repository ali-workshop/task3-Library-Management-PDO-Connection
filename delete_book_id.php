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
        <form id="bookForm" action="" method="get">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" id="id" name="id" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit">DELETE BOOK USING ID</button>

            </div>
        </form>
    </div>
</body>

</html>





<?php



if (isset($_GET["submit"])) {
    $id = $_GET["id"];

    header("Location:./delete_book.php?id=$id");
}

?>
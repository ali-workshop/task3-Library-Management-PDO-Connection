<?php
// in the senario below i maybe get the method as get or as post :) 
//as get because of the header function 
//as post because of the form.html submit   
if ($_SERVER["REQUEST_METHOD"] == "GET" || $_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once "./data_connection.inc.php";
        $query = "SELECT * FROM books";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($data)) {
            ?>

            <body>
                <img src="nodata.jpg" alt="Italian Trulli" style="width:500px;height:600px; display:block; margin:auto;">
            </body>
            <?php
        } else {
            ?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Simple Table Design</title>
                <link rel="stylesheet" href="style1.css">
            </head>

            <body>
                <table id="simpleTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Publication Year</th>
                            <th>Genre</th>
                            <th>Page_count</th>
                            <th>Language</th>
                            <th>Summary</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row): ?>
                            <tr>
                                <td>
                                    <?php echo htmlspecialchars($row["id"]); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($row["title"]); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($row["author"]); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($row["publisher"]); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($row["publicationYear"]); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($row["genre"]); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($row["pageCounte"]); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($row["booklanguage"]); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($row["summary"]); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($row["price"]); ?>
                                </td>

                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </body>

            </html>
        <?php }

        $pdo = null;
        $stmt = null;


    } catch (Exception $error) {

        echo "the query is field " . $error->getMessage();

    }

} else {
    header("Location:./form.html");

}
?>
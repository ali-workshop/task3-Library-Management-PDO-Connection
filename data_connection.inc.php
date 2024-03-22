<?php

$dsn = "mysql:host=localhost;dbname=mybook";
$db_username = "root";
$db_password = "";

try {
    $pdo = new PDO($dsn, $db_username, $db_password);


    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $error) {

    echo "the connection field" . $error->getMessage();

}








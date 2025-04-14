<?php 
include "../database/databaseConnection.php";

$stmt = $conn->prepare("SELECT * FROM rezepte");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $result;
}




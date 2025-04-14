<?php

include "database/databaseConnection.php";

$currentRecipe = $_GET["recipe"];

$stmt = $conn->prepare("SELECT * FROM rezepte WHERE rezept_name = '$currentRecipe' ");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);


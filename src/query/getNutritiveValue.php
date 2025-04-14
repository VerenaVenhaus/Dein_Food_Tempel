<?php include "database/databaseConnection.php";

$stmtNutritiveValue = $conn->prepare("SELECT * FROM naehrwerte");
$stmtNutritiveValue->execute();


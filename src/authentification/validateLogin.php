<?php

include "../database/databaseConnection.php";
session_start();

$sql = "SELECT * FROM nutzer";
$stmtNutzer = $conn->prepare($sql);
$stmtNutzer->execute();
$resultNutzer = $stmtNutzer->setFetchMode(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $nutzer = $_POST['nutzer'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    if($password == $confirmPassword) {
    $sql = "INSERT INTO nutzer(nutzername, email, passwort, passwort_bestätigung) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nutzer, $email, $password, $confirmPassword]);

    $_SESSION["user"] == $nutzer;
    header("Location: http://localhost/Dein_Food_Tempel/src/index.php");
    } 
    else { 
        $_SESSION["user"] = "wrongPassword";
        header("Location: http://localhost/Dein_Food_Tempel/src/authentification/authenticate.php");
    }
}
if($_SERVER['REQUEST_METHOD'] == "GET") {
    header("Location: http://localhost/Dein_Food_Tempel/src/index.php");
}

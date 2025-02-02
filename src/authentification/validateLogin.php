<?php

include "../database/databaseConnection.php";


if($_SERVER['REQUEST_METHOD'] == "POST") {
    $nutzer = $_POST['nutzer'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    if ($password == $confirmPassword) {
    $sql = "INSERT INTO nutzer(nutzername, email, passwort, passwort_bestätigung) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nutzer, $email, $password, $confirmPassword]);


    header("Location: http://localhost/Dein_Food_Tempel/src/index.php");
    } else { 
        header("Location: http://localhost/Dein_Food_Tempel/src/authentification/authenticate.php");
        echo "Passwort nicht indentisch";
    }
}
if($_SERVER['REQUEST_METHOD'] == "GET") {
    header("Location: http://localhost/Dein_Food_Tempel/src/index.php");
}
/* $stmt = $conn->prepare("SELECT * FROM rezepte");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $result; */
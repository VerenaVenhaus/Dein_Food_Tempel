<?php

include "../database/databaseConnection.php";
session_start();


$stmtEmail = $conn->prepare("SELECT * FROM nutzer WHERE email = '$email'");
$stmtEmail->execute();
$resultEmail = $stmtEmail->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $salt = bin2hex(random_bytes(16)); // Generate a 16-byte random salt
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nutzer = $_POST['nutzer'];
    $combinedPassword = $password . $salt;
    $hashedPassword = password_hash($combinedPassword, PASSWORD_BCRYPT);
    $confirmPassword = $_POST['confirm_password'];
    if ($resultEmail["email"] == $email) {
        $_SESSION["user"] = "emailExists";
        $emailExists = "true";
        header("Location: http://localhost/Dein_Food_Tempel/src/authentification/authenticate.php");
    } elseif ($password != $confirmPassword) {
        $_SESSION["user"] = "wrongPassword";
        header("Location: http://localhost/Dein_Food_Tempel/src/authentification/authenticate.php");

    } elseif ($password == $confirmPassword) {
        $sql = "INSERT INTO nutzer(nutzername, email, passwort, salt) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nutzer, $email, $hashedPassword, $salt]);

        $_SESSION["user"] = $nutzer;
        $_SESSION["login"] = "true";
        header("Location: http://localhost/Dein_Food_Tempel/src/index.php");

    }

}

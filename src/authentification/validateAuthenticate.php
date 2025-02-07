<?php

include "../database/databaseConnection.php";
session_start();

$salt = bin2hex(random_bytes(16)); // Generate a 16-byte random salt
$emailExists = "false";


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nutzer = $_POST['nutzer'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    $stmtEmail = $conn->prepare("SELECT * FROM nutzer WHERE email = '$email'");
    $stmtEmail->execute();
    $resultEmail = $stmtEmail->fetch(PDO::FETCH_ASSOC);
    
  
        if ($resultEmail["email"] == $email) {
            $_SESSION["user"] = "emailExists";
            $emailExists = "true";
            header("Location: http://localhost/Dein_Food_Tempel/src/authentification/authenticate.php");
        } 
       elseif($password != $confirmPassword && $emailExists = "checked") {
            $_SESSION["user"] = "wrongPassword";
            header("Location: http://localhost/Dein_Food_Tempel/src/authentification/authenticate.php");
           
        }
        elseif ($password == $confirmPassword && $emailExists = "checked") {
            $sql = "INSERT INTO nutzer(nutzername, email, passwort, salt) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$nutzer, $email, $password, $salt]);
    
            $_SESSION["user"] = $nutzer;
            $_SESSION["login"] = "true";
            header("Location: http://localhost/Dein_Food_Tempel/src/index.php");
            
        }

}
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    header("Location: http://localhost/Dein_Food_Tempel/src/index.php");
}

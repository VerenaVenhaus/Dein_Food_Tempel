<?php

include "../database/databaseConnection.php";
session_start();




if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $emailExists = "false";
    $email = $_POST['email-login'];
    $password = $_POST['password-login'];
    $stmt = $conn->prepare("SELECT * FROM nutzer WHERE email = '$email'");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result == true && $result["email"] == $email) {
        // Retrieve $hashedPassword and $salt from the database based on the username or email
        $saltLogin = $result["salt"];
        $combinedPassword = $password . $saltLogin;
        $hashedPassword = $result["passwort"];
        $isPasswordCorrect = password_verify($combinedPassword, $hashedPassword);
        if($isPasswordCorrect) {
            // Password is correct, allow login
            $_SESSION["user"] = $result["nutzername"];
            $_SESSION["login"] = "true";
            header("Location: http://localhost/Dein_Food_Tempel/src/index.php");
        } else {
            // Password is incorrect, deny login
            $_SESSION['user'] = "wrongPassword";
            header("Location: http://localhost/Dein_Food_Tempel/src/authentification/login.php");
        }
     
    } else {
        $_SESSION['user'] = "emailNotExists";
        header("Location: http://localhost/Dein_Food_Tempel/src/authentification/login.php");
    }
}

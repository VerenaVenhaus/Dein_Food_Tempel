<?php 
include '../database/databaseConnection.php';
session_start();
// Setzt Session-Key
if(!isset($_SESSION["user"])) $_SESSION["user"] = "";
$_SESSION["login"] == "false";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <title>Dein_Food_Tempel</title>
    <link rel="icon" type="image/x-icon" href="../images/koala.jpg">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-amber-50">
    <header class="bg-lime-700 text-white mb-2 h-16 flex items-center justify-between px-2">
        <div class="flex">
            <img src="../images/koala.jpg" alt="Koala" class="mr-4 rounded-full w-10 h-10"/>
            <div class="self-center font-thin">Dein_Food_Tempel</div>
        </div>
        <div class="flex gap-3 font-thin">
        <a href="login.php" class="hover:cursor-pointer hover:opacity-80 text-slate-200 ">Anmelden</a>
        <a href="authenticate.php" class="hover:cursor-pointer hover:opacity-80">Registrieren</a>
        </div>
    </header>
    <form action="validateLogin.php" method="POST">
<div class="border-2 w-96 flex px-6 py-4  rounded-md flex-col h-auto mx-auto mt-16  ">
<img src="../images/koala.jpg" alt="Koala" class="mt-4 rounded-full w-24 h-24 self-center"/>
  <label class="mt-3" for="email">E-Mail Adresse</label>
  <input class="border h-8 rounded-sm text-black p-2" type="text" id="email" name="email">
  <div class="text-red-500 text-xs"><?php echo $_SESSION['user'] == "emailNotExists"? 'E-Mail existiert noch nicht' : '' ?></div>
  <label class="mt-3" for="password">Passwort</label>
  <input class="border h-8 rounded-sm p-2" type="text" id="password" name="password">
  <div class="text-red-500 text-xs"><?php echo $_SESSION['user'] == "wrongPassword"? 'Passwort oder E-Mail falsch' : '' ?></div>
  <button value="login" class="w-28 h-10 text-center font-medium mt-8 mx-auto hover:pointer text-white hover:opacity-80 bg-lime-700 rounded-sm bg-" type="submit">Login</button>
  <div class="flex gap-1 mt-3 font-light text-xs mx-auto">
      <div>Noch keinen Account? Hier</div>
      <a href="authenticate.php" class="text-orange-500">Registrieren</a>
    </div>
</div>
</form>
</body>
<script src="../src/script.js"></script>
</html>
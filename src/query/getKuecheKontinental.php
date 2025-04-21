<?php
$stmtKuecheKontinente = $conn->prepare("SELECT * FROM küche_kontinental");
$stmtKuecheKontinente->execute();
<?php

    $stmtLebensweise = $conn->prepare("SELECT * FROM lebensweise ORDER BY name_lebensweise ASC");
    $stmtLebensweise->execute();


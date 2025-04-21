<?php

$stmtKuecheLand = $conn->prepare("SELECT * FROM kueche_laender WHERE kueche_kontinent_id = $kontinentId ORDER BY name_kueche_laender ASC");
$stmtKuecheLand->execute();
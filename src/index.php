<?php
include 'databaseConnection.php';

$stmt = $conn->prepare("SELECT * FROM rezepte");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

/* while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $result["rezept_name"];
    echo "</br>";
} */
/* try {
    $stmt = $conn->prepare("SELECT * FROM rezepte");
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
echo $result;
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dein_Food_Tempel</title>
    <link rel="icon" type="image/x-icon" href="../src/images/koala.jpg">
</head>

<body class="bg-amber-50">
    <header class="bg-lime-700 text-white mb-2 h-16 flex items-center justify-between px-2">
        <div class="flex">
            <img src="../src/images/koala.jpg" alt="Koala" class="mr-4 rounded-full w-10 h-10" />
            <div class="self-center font-thin">Dein_Food_Tempel</div>
        </div>
        <div class="flex gap-2">
            <a href="../authentification/login.php" class="hover:opacity-80">Logout</a>
        </div>
    </header>
    <div class="w-full h-full ">
        <div class="flex">
            <div class="w-72 border-r-2 p-2">
                <label class="font-semibold" for="suche">Suche</label>
                <input class="border border-lime-700 h-8 rounded-lg text-black p-2 mt-1" type="text" id="suche" name="suche" value="">
                <div class="font-semibold mt-7">Filter:</div>
                <div>Nährwerte</div>
                <div>Gericht</div>
                <div>Geschmacksrichtung</div>
                <div>Lebensweise</div>
                <div>Ernährung</div>

            </div>
            <div class="grid grid-cols-4 gap-5 w-full my-4 mx-28 ">
                <?php while ($result = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <div class="shadow rounded-md pb-2">
                        <img src="<?= $result["image"] ?>" alt="" class="w-full rounded-md mb-1" />
                        <div class="text-start text-sm font-semibold"><?= $result["rezept_name"] ?></div>
                        <div class="flex gap-2">
                            <div class="flex gap-1 flex-row text-xs">
                                <?php if ($result["zubereitungszeit"] != null): ?>
                                    <div><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg></div>
                                    <div><?= $result["zubereitungszeit"] . " Min." ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="flex flex-row text-xs items-center">
                                <div class=" bg-green-500 w-2 h-2 rounded-full mr-1 mt-1"></div>
                                <div>einfach</div>
                            </div>

                        </div>
                        <div class="text-xs">Quelle: Zwergen Kochbuch</div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

    </div>
</body>

</html>
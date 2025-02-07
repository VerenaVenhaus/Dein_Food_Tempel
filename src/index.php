<?php
include 'database/databaseConnection.php';
session_start();

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

<?php include "PageComponents/head.php" ?>
<?php if( $_SESSION["login"] == "true" ): ?>
<body class="bg-amber-50">
<?php include "PageComponents/header.php" ?>
    <div class="w-full h-full ">
        <div class="flex">
            <div class="w-72 border-r-2 p-2">
                <label class="font-semibold" for="suche">Suche</label>
                <div class="input-group w-full h-8 items-center gap-2 flex justify-between mt-1">
                    <input class="border border-lime-700 h-8 rounded-lg text-black p-2" type="text" id="suche" name="suche" value="">
                    <button type="submit" class="border-white bg-lime-700 h-7 hover:opacity-80 text-xs px-2 rounded-md text-white">Los</button>
                </div>
                <div class="font-semibold mt-7">Filter:</div>
                <div>Nährwerte</div>
                <div>Gericht</div>
                <div>Geschmacksrichtung</div>
                <div>Lebensweise</div>
                <div>Ernährung</div>

            </div>
            <div class="grid grid-cols-4 gap-5 w-full my-4 mx-28 ">
                <?php while ($result = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <a href="recipe.php?recipe=<?=$result["rezept_name"]?>">
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
                    </a>
                <?php endwhile; ?>
            </div>
        </div>

    </div>
</body>
<?php else :
     header("Location: http://localhost/Dein_Food_Tempel/src/authentification/authenticate.php");
    endif; ?>
<?php include "PageComponents/footer.php" ?>
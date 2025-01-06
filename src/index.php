<?php 
include 'databaseConnection.php';

/* try {
    $stmt = $conn->prepare("SELECT * FROM rezepte");
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
echo $result;
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
  echo "</table>"; */
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
        <img src="../src/images/koala.jpg" alt="Koala" class="mr-4 rounded-full w-10 h-10"/>
        <div class="self-center font-thin">Dein_Food_Tempel</div>
        </div>
        <div class="flex gap-2">
            <div>Logout</div>
        </div>
    </header>
    <div class="w-full h-full ">
        <div class="flex">
            <div class="w-72 border-r-2 p-2">
                <div class="font-semibold">Filter:</div>
                <div>Nährwerte</div>
                <div>Gericht</div>
                <div>Geschmacksrichtung</div>
                <div>Lebensweise</div>
                <div>Ernährung</div>

            </div>

            <div class="grid grid-cols-3 gap-5 w-full my-4 mx-28 ">
                <div class="shadow rounded-md pb-2">
                    <img src="./images/Burger_selber_machen_rezept.avif" alt="" class="w-full rounded-md mb-1" />
                    <div class="text-start text-sm font-semibold">Grilled Beef Burger</div>
                    <div class="flex gap-2">
                        <div class="flex gap-1 flex-row text-xs">
                            <div><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
</svg></div>
                            <div>20 Min</div>
                        </div>
                        <div class="flex flex-row text-xs">
                            <div>Icon</div>
                            <div>simpel</div>
                        </div>

                    </div>
                    <div class="text-xs">Quelle: Zwergen Kochbuch</div>
                </div>
                <div class="shadow rounded-md pb-2">
                    <img src="./images/Burger_selber_machen_rezept.avif" alt="" class="w-full rounded-md mb-1" />
                    <div class="text-start text-sm font-semibold">Grilled Beef Burger</div>
                    <div class="flex gap-2">
                        <div class="flex flex-row text-xs">
                            <div>Icon</div>
                            <div>20 Min</div>
                        </div>
                        <div class="flex flex-row text-xs">
                            <div>Icon</div>
                            <div>simpel</div>
                        </div>

                    </div>
                    <div class="text-xs">Quelle: Zwergen Kochbuch</div>
                </div>
                <div class="shadow rounded-md pb-2">
                    <img src="./images/Burger_selber_machen_rezept.avif" alt="" class="w-full rounded-md mb-1" />
                    <div class="text-start text-sm font-semibold">Grilled Beef Burger</div>
                    <div class="flex gap-2">
                        <div class="flex flex-row text-xs">
                            <div>Icon</div>
                            <div>20 Min</div>
                        </div>
                        <div class="flex flex-row text-xs">
                            <div>Icon</div>
                            <div>simpel</div>
                        </div>

                    </div>
                    <div class="text-xs">Quelle: Zwergen Kochbuch</div>
                </div>
                <div class="shadow rounded-md pb-2">
                    <img src="./images/Burger_selber_machen_rezept.avif" alt="" class="w-full rounded-md mb-1" />
                    <div class="text-start text-sm font-semibold">Grilled Beef Burger</div>
                    <div class="flex gap-2">
                        <div class="flex flex-row text-xs">
                            <div>Icon</div>
                            <div>20 Min</div>
                        </div>
                        <div class="flex flex-row text-xs">
                            <div>Icon</div>
                            <div>simpel</div>
                        </div>

                    </div>
                    <div class="text-xs">Quelle: Zwergen Kochbuch</div>
                </div>

            </div>
        </div>

    </div>
</body>

</html>
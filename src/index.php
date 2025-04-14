<?php
include 'database/databaseConnection.php';
include "query/getNutritiveValue.php";
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
                <div class="font-semibold mt-7 mb-3">Filter:</div>
                
<button id="btn-dropdown-lebensweise" data-dropdown-toggle="dropdown-lebensweise" class="w-44 font-medium  text-sm pr-4 py-1.5 text-center flex justify-between items-center " type="button">Lebensweise <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="m1 1 4 4 4-4"/>
</svg>
</button>
<!-- Dropdown menu -->
<div id="dropdown-lebensweise" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm max-h-48 h-fit overflow-y-scroll w-44 dark:bg-gray-700">
    <ul class=" text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Vegan</a>
      </li>
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Vegetarisch</a>
      </li>
    </ul>
</div>
<button id="btn-dropdown-gericht" data-dropdown-toggle="dropdown-gericht" class=" w-44 font-medium  text-sm pr-4 py-1.5 text-center flex justify-between items-center " type="button">Gericht <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="m1 1 4 4 4-4"/>
</svg>
</button>
<!-- Dropdown menu -->
<div id="dropdown-gericht" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm max-h-48 h-fit overflow-y-scroll w-44 dark:bg-gray-700">
    <ul class=" text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Vegan</a>
      </li>
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Vegetarisch</a>
      </li>
    </ul>
</div>
<button id="btn-dropdown-geschmacksrichtung" data-dropdown-toggle="dropdown-geschmacksrichtung" class=" w-44 font-medium  text-sm pr-4 py-1.5 text-center flex justify-between items-center " type="button">Geschmacksrichtung <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="m1 1 4 4 4-4"/>
</svg>
</button>
<!-- Dropdown menu -->
<div id="dropdown-geschmacksrichtung" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm max-h-48 h-fit overflow-y-scroll w-44 dark:bg-gray-700">
    <ul class=" text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Vegan</a>
      </li>
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Vegetarisch</a>
      </li>
    </ul>
</div>
<button id="btn-dropdown-ernaehrung" data-dropdown-toggle="dropdown-ernaehrung" class="w-44 font-medium  text-sm pr-4 py-1.5 text-center flex justify-between items-center " type="button">Ernährung <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="m1 1 4 4 4-4"/>
</svg>
</button>
<!-- Dropdown menu -->
<div id="dropdown-ernaehrung" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm max-h-48 h-fit overflow-y-scroll w-44 dark:bg-gray-700">
    <ul class=" text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Vegan</a>
      </li>
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Vegetarisch</a>
      </li>
    </ul>
</div>

<button id="multiLevelDropdownButton-Naehrwerte" data-dropdown-toggle="multi-dropdown-naehrwerte" class=" w-44 font-medium  text-sm pr-4 py-1.5 text-center flex justify-between items-center" type="button">Nährwerte<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="m1 1 4 4 4-4"/>
</svg>
</button>

<!-- Dropdown menu -->
<div id="multi-dropdown-naehrwerte" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="multiLevelDropdownButton">
    <?php while($resultNutritiveValue = $stmtNutritiveValue->fetch(PDO::FETCH_ASSOC)) :?> 
    <li>
        <button id="doubleDropdownButton-<?=$resultNutritiveValue["naehrwert_name"]?>" data-dropdown-toggle="doubleDropdown-<?=$resultNutritiveValue["naehrwert_name"]?>" data-dropdown-placement="right-start" type="button" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><?=$resultNutritiveValue["naehrwert_name"]?><svg class="w-2.5 h-2.5 ms-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
  </svg></button>
          <div id="doubleDropdown-<?=$resultNutritiveValue["naehrwert_name"]?>" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="doubleDropdownButton-<?=$resultNutritiveValue["naehrwert_name"]?>">
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Overview</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">My downloads</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Billing</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Rewards</a>
              </li>
            </ul>
        </div>
      </li>
      <?php endwhile; ?>
  
    </ul>
</div>


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
    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>

</body>
<?php else :
     header("Location: http://localhost/Dein_Food_Tempel/src/authentification/authenticate.php");
    endif; ?>
<?php include "PageComponents/footer.php" ?>
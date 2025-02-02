<?php 
include "database/databaseConnection.php";
include "database/getSingleRecipe.php";
?>

<?php include "PageComponents/head.php" ?>
<?php include "PageComponents/header.php" ?>

<div class="w-5/6 bg-slate-100 shadow-lg mx-auto">
<?php while($result = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
    <div class="flex">
    <img src="<?= $result["image"] ?>" alt="" class="w-96 rounded-md mb-1"/>
    <div>
    <div class="text-3xl font-medium font-serif ml-5 mt-2"><?= $result["rezept_name"] ?></div>
    <div class="text-xl font-medium font-serif ml-5 mt-2"><?= $result["zusatz_rezept_beschreibung"] ?></div>
    </div>
    </div>
    <?php endwhile; ?>
</div>
<?php include "PageComponents/footer.php" ?>


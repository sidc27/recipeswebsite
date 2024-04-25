<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Website</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <header>
        <h1>Recipe Website</h1>

        <nav>
            <ul>
            <li><a href="index.php">Home</a></li>
                <li><a href="recipes.php">Recipes</a></li>
                <li><a href="userrecipes.php">Create a Recipe</a></li>
                <li><a href="myrecipes.php">My Recipes</a></li>
                <li><a href="shoppinglist.php">Shopping List</a></li>
                <li><a href="about.php">About Us</a></li>
            </ul>
        </nav>
        
    </header>
</body>

<?php
require_once "includes/dbh.inc.php";

try {
    // Fetch all recipes
    $query = "SELECT recipeName, ingredients FROM userrecipes";
    $stmt = $pdo->query($query);

    // Initialize an empty array to store aggregated ingredients
    $shoppingList = [];

    // Parse ingredients for each recipe
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Split ingredients string into individual ingredients
        $ingredients = explode(',', $row['ingredients']);
        
        // Trim each ingredient to remove leading/trailing spaces
        $ingredients = array_map('trim', $ingredients);
        
        // Add ingredients to the shopping list
        $shoppingList = array_merge($shoppingList, $ingredients);
    }

    // Remove duplicate ingredients
    $shoppingList = array_unique($shoppingList);

    // Output the shopping list
    echo "<h2>Shopping List</h2>";
    echo "<ul>";
    foreach ($shoppingList as $ingredients) {
        echo "<li>$ingredients</li>";
    }
    echo "</ul>";
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}

$pdo = null;
?>

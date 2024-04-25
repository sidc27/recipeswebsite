<?php
require_once "dbh.inc.php";

// Initialize the $classification variable
$classification = "";

// Check if a classification is selected from the dropdown menu
if (isset($_GET['classification']) && !empty($_GET['classification'])) {
    $classification = $_GET['classification'];
}

// Fetch recipes based on the selected classification (if any)
$query = "SELECT * FROM userrecipes";
if (!empty($classification)) {
    $query .= " WHERE classification = :classification";
}

try {
    $stmt = $pdo->prepare($query);

    // Bind classification parameter if it exists
    if (!empty($classification)) {
        $stmt->bindParam(":classification", $classification);
    }

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<p>Recipe Name: " . $row['recipeName'] . "</p>";
            echo "<p>Description: " . $row['recipeDescription'] . "</p>";
            echo "<p>ingredients: " . $row['ingredients'] . "</p>";
            echo "<p>Classification: " . $row['classification'] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "No recipes found.";
    }
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}

// Handle form submission to add new recipe
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $recipeName = $_POST['recipeName'];
    $recipeDescription = $_POST['recipeDescription'];
    $ingredients = $_POST['ingredients'];
    $classification = $_POST['classification'];


try {
    require_once "dbh.inc.php";


    $query = "INSERT INTO userrecipes (recipeName, recipeDescription, ingredients, classification) VALUES (:recipeName, :recipeDescription,:ingredients, :classification);";


    $stmt = $pdo->prepare($query);


    $stmt ->bindParam(":recipeName", $recipeName);
    $stmt ->bindParam(":recipeDescription", $recipeDescription);
    $stmt ->bindParam(":ingredients", $ingredients);
    $stmt ->bindParam(":classification", $classification);




    $stmt->execute();


    $pdo=null;
    $stmt=null;


    header("Location: ../userrecipes.php");


    die();
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}


}
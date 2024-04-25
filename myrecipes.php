<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Recipes</title>
    <link rel="stylesheet" href="userrecipes.css">
</head>

<body>
    <header>
        <h1>My Recipes</h1>
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

    <main class="container">

        <div class="filter-section">
            <form method="GET" action="">
                <label for="classification">Filter by Classification:</label>
                <select name="classification" id="classification">
                    <option value="">All</option>
                    <option value="vegan">Vegan</option>
                    <option value="vegetarian">Vegetarian</option>
                    <option value="pescatarian">Pescatarian</option>
                    <option value="none">None</option>

                </select>
                <button type="submit">Filter</button>
            </form>
        </div>

        <div class=recipe-card>

            <?php
            require_once "includes/dbh.inc.php";

            try {
                $query = "SELECT * FROM userrecipes";
                $stmt = $pdo->query($query);

                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<p>Recipe Name: " . $row['recipeName'] . "</p>";
                        echo "<p>Description: " . $row['recipeDescription'] . "</p>";
                        echo "<p>Ingredients: " . $row['ingredients'] . "</p>";
                        echo "<p>Classification: " . $row['classification'] . "</p>";

                        // Delete button
                        echo "<form method='post' action='includes/delete_recipe.php'>";
                        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                        echo "<input type='submit' name='delete' value='Delete'>";
                        echo "</form>";

                        echo "<hr>";
                    }
                } else {
                    echo "No recipes found.";
                }
            } catch (PDOException $e) {
                die("Query failed: " . $e->getMessage());
            }

            $pdo = null;
            ?>



        </div>


        </form>
    </main>

    <footer>
        <p>&copy; 2024 Recipe Website. All rights reserved.</p>
    </footer>
</body>

</html>
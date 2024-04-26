<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Recipes</title>
    <link rel="stylesheet" href="userrecipes.css">
</head>

<body>
    <header>
        <h1>All Recipes</h1>
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

        

        <div class=recipe-card>

            <?php
            require_once "includes/dbh.inc.php";

            try {
                $query = "SELECT * FROM allrecipes";
                $stmt = $pdo->query($query);

                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<p>Recipe Name: " . $row['recipeName'] . "</p>";
                        echo "<p>Description: " . $row['recipeDescription'] . "</p>";
                        echo "<p>Ingredients: " . $row['ingredients'] . "</p>";
                        echo "<p>Classification: " . $row['classification'] . "</p>";

                        

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
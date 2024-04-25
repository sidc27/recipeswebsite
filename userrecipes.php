

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
        <h1>Create a Recipe</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="recipes.php">Recipes</a></li>
                <li><a href="userrecipes.php">Create a Recipes</a></li>
                <li><a href="myrecipes.php">My Recipes</a></li>
                <li><a href="shoppinglist.php">Shopping List</a></li>
                <li><a href="about.php">About Us</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <!-- Recipe Cards will be dynamically inserted here -->
        <div class="recipe-card">
            <form action="includes/userrecipes.inc.php" method="post">

                <h2> <label for="Recipe-Name">Recipe Name:</label></h2>
                <input type="text" id="Recipe-Name" name="recipeName" required>
                <br>
                <h3><label for="description">Description:</label></h3>
                <input type="text" id="description" name="recipeDescription" required>
                <h3><label for="description">Ingredients:</label></h3>
                <input type="text" id="ingredients" name="ingredients" required>
                <br>
                <h3><label for="classification">Classification:</label></h3>
        <select id="classification" name="classification" required>
            <option value="vegan">Vegan</option>
            <option value="vegetarian">Vegetarian</option>
            <option value="pescatarian">Pescatarian</option>
            <option value="none">None</option>
        </select>
        <br>
        <input type="submit" value="Create Recipe">


        </div>


        </form>
    </main>

    <footer>
        <p>&copy; 2024 Recipe Website. All rights reserved.</p>
    </footer>
</body>

</html>
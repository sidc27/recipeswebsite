<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign In Page</title>
<link rel="stylesheet" href="login.css">
</head>
<body>

<h3>
    
</h3>
<div class="container">

    <h2>Log In</h2>
    <form action="includes/login.inc.php" method="post">
        <label for="signin-username">Username:</label>
        <input type="text" id="signin-username" name="username" required>

        <label for="signin-password">Password:</label>
        <input type="password" id="signin-password" name="pwd" required>

        <input type="submit" value="Sign In">

        <div class="switch-page">
            <span>Don't have an account? </span><a href="signup.php">Sign up</a>
        </div>
    </form>

    <?php
    check_login_errors();
    ?>

   
</div>
</body>
</html>

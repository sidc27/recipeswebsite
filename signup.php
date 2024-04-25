<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php'

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create an Account</title>
<link rel="stylesheet" href="signup.css">
</head>
<body>
<div class="container">
    <h2>Create an Account</h2>
    <form action="includes/signup.inc.php" method="post">
        <label for="create-username">Username:</label>
        <input type="text" id="create-username" name="username" required>

        <label for="create-email">Email:</label>
        <input type="email" id="create-email" name="email" required>

        <label for="create-password">Password:</label>
        <input type="password" id="create-password" name="pwd" required>

        <input type="submit" value="Create Account">

        <div class="switch-page">
            <span>Already have an account? </span><a href="login.css">Sign in</a>
        </div>
    </form>
</div>

<?php
check_signup_errors();
?>
</body>
</html>

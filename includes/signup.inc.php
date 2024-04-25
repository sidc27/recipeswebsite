<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username= $_POST["username"];
    $email= $_POST["email"];
    $pwd= $_POST["pwd"];

    try {
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        $errors=[];

        if(is_input_empty($username, $email, $pwd )){
            $errors["empty_input"]="Fill in all fields!";
        }
        if(is_email_invalid($email)){
            $errors["invalid_email"]="Invalid email used!";

        }
        if(is_username_taken( $pdo, $username)){
            $errors["username_taken"]="Username already taken!";

        }
        if(is_email_registered( $pdo, $email)
        ){
            $errors["email_used"]="Email already registered";

        }

        require_once 'config_session.inc.php';

        if($errors){
            $_SESSION["errors_signup"]=$errors;

            $signupData = [
                "username"=>$username,
                "email"=>$email
            ];
            $_SESSION["signup_data"]=$signupData;
             
            header("Location: ../signup.php");
            die();
        }

        create_user( $pdo, $pwd,  $username, $email);

        $query="INSERT INTO users (username, email, pwd) VALUES(:username, :email, :pwd);";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":pwd", $pwd);


        $stmt->execute();

        $pdo=null;
        $stmt=null;

        header("Location: ../login.php?signup=success");

        $pdo=null;
        $stmt=null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
   
}
else{
    header("Location: ../signup.php");
    die();
}
<?php
require_once "dbh.inc.php";

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    try {
        $query = "DELETE FROM userrecipes WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        header("Location: ../myrecipes.php"); // Redirect to the page after deletion
        exit();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}

$pdo = null;
?>

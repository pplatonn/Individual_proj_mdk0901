<?php
if(isset($_POST["id"]))
{
    try {
        $conn = new PDO("mysql:host=localhost;dbname=recepts", "root", '');
        $sql = "DELETE FROM recept WHERE id = :receptid";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":receptid", $_POST["id"]);
        $stmt->execute();
        header("Location: ./../../admin.php");
    }
    catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>

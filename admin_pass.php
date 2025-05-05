<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <form action="#" method="post">
        <input type="text" placeholder="login" name="login" required>
        <input type="password" placeholder="password" name="password" required>
        <button type="submit">Next</button>
    </form>
    <?php
        if(isset($_POST["login"]) and isset($_POST["password"])){
            if($_POST["login"]=="admin" and $_POST["password"]=="admin"){
                header("Location: ./admin.php");
            }
            else{
                echo "<p>Incorrect login or password!</p>";
            }
        }
    ?>
</body>
</html>
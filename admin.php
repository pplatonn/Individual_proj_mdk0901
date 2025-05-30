<?php
$host = 'localhost';
$db_user = 'root';
$db_password = '';

try {
    $pdo = new PDO("mysql:host=$host", $db_user, $db_password);
    $sql = "CREATE DATABASE IF NOT EXISTS recepts";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
    die("Connection error: " . $e->getMessage());
}

$pdo = new PDO("mysql:host=$host;dbname=recepts", $db_user, $db_password);
$sql = "CREATE TABLE IF NOT EXISTS recept
            (id INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(100),
            photo VARCHAR(200),
            ingr1 VARCHAR(100),
            ingr2 VARCHAR(100),
            ingr3 VARCHAR(100),
            ingr4 VARCHAR(100),
            ingr5 VARCHAR(100),
            ingr6 VARCHAR(100),
            ingr7 VARCHAR(100),
            ingr8 VARCHAR(100),
            ingr9 VARCHAR(100),
            ingr10 VARCHAR(100),
            description TEXT,
            instructions TEXT);";

$stmt = $pdo->prepare($sql);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin ⚙️</title>
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="./assets/css/fonts.css" />
</head>

<body id="root">

    <header>
        <div class="container">
            <nav>
                <img src="./assets/graphics/logo.jpg" alt="логотип" id="logo" />
                <ul class="menu">
                    <li class="menu__title"><a href="./index.html">Find a recipe</a></li>
                    <li class="menu__title"><a href="./comm_r.php">Community Recipes</a></li>
                    <li class="menu__title"><a href="./add.php">Add recipe</a></li>
                    <li class="menu__title"><a href="./favorites.html">Favorites</a></li>
                </ul>
                <img src="./assets/graphics/change-theme.svg" alt="change theme" id="changeTheme" />
            </nav>
        </div>
    </header>

    <div id="comm">
        <form method="post" action="./assets/php/delete_table.php">
            <button type="submit">Delete users recipe table</button>
        </form>
        <?php
        $conn = new mysqli('localhost', 'root', '', 'recepts');

        $sql = "SELECT * FROM recept";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo
                "<section>" .
                    "<h1>" . $row["name"] . "</h1>" .
                    "<img src='" . $row["photo"] . "'>" .
                    "<h2>Ingredients</h2>" .

                    "<ul>" .
                    "<li>" . $row["ingr1"] . "</li>" .
                    "<li>" . $row["ingr2"] . "</li>" .
                    "<li>" . $row["ingr3"] . "</li>" .
                    "<li>" . $row["ingr4"] . "</li>" .
                    "<li>" . $row["ingr5"] . "</li>" .
                    "<li>" . $row["ingr6"] . "</li>" .
                    "<li>" . $row["ingr7"] . "</li>" .
                    "<li>" . $row["ingr8"] . "</li>" .
                    "<li>" . $row["ingr9"] . "</li>" .
                    "<li>" . $row["ingr10"] . "</li>" .
                    "</ul>" .

                    "<h2>Description</h2>" .
                    "<p>" . $row["description"] . "</p>" .
                    "<h2>Instructions</h2>" .
                    "<p>" . $row["instructions"] . "</p>" .

                    "<form action='./assets/php/delete_elt.php' method='post'>
                        <input type='hidden' name='id' value='" . $row["id"] . "' />
                        <input type='submit' value='Delete'>
                    </form>" .
                "</section>";
            }
        } else {
            echo "<div class='container'>
                    <h1>There are no recipes from users.</h1>
                </div>
                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";
        }

        $conn->close();
        ?>
    </div>

    <footer>
        <div class="container">
            <nav>
                <ul class="footer_menu">
                    <li class="footer_menu__title"><a href="./index.html">Find a recipe</a></li>
                    <li class="footer_menu__title"><a href="./comm_r.php">Community Recipes</a></li>
                    <li class="footer_menu__title"><a href="./add.php">Add recipe</a></li>
                    <li class="footer_menu__title"><a href="./favorites.html">Favorites</a></li>
                </ul>
                <a href="mailto:viberecipes@gmail.com">viberecipes@gmail.com</a>
                <span>(с) all rights reserved</span>
            </nav>
        </div>
    </footer>

    <script>
        const listItems = document.querySelectorAll('li');
        console.log("test");
        listItems.forEach(li => {
            if (li.textContent.length < 2) {
                li.remove();
            }
        })
    </script>
    <script src="./assets/js/main.js"></script>
</body>

</html>

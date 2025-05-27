<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes from the community 👥</title>
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

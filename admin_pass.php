<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login 🔖</title>
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="./assets/css/fonts.css" />
</head>

<body>

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

    <section class="login">
        <div class="container">
            <form action="#" method="post">
                <img src="./assets/graphics/avatar.svg" alt="введите свои данные" />
                <input type="text" placeholder="login" name="login" required>
                <input type="password" placeholder="password" name="password" required>
                <button type="submit">Next</button>
            </form>
            <?php
            if (isset($_POST["login"]) and isset($_POST["password"])) {
                if ($_POST["login"] == "admin" and $_POST["password"] == "admin") {
                    header("Location: ./admin.php");
                } else {
                    echo "<p style='text-align:center;'>Incorrect login or password!</p>";
                }
            }
            ?>
        </div>
    </section>

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

    <script src="./assets/js/main.js"></script>
</body>

</html>

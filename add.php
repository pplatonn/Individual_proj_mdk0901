<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding a recipe 🍅</title>
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

    <section class="add">
        <div class="container">
            <h1>Please enter the required data:</h1>
            <form method="post" action="#">
                <label for="recipe_name">Name of the recipe:</label><br />
                <input name="name" placeholder="Name" type="text" required><br />

                <label for="recipe_name">Photo:</label><br />
                <input name="photo" placeholder="Link to photo" type="text" required><br />

                <label for="">Ingredients:</label><br/>
                <input name="ingr1" placeholder="Ingredient 1" type="text"><br />
                <input name="ingr2" placeholder="Ingredient 2" type="text"><br />
                <input name="ingr3" placeholder="Ingredient 3" type="text"><br />
                <input name="ingr4" placeholder="Ingredient 4" type="text"><br />
                <input name="ingr5" placeholder="Ingredient 5" type="text"><br />
                <input name="ingr6" placeholder="Ingredient 5" type="text"><br />
                <input name="ingr7" placeholder="Ingredient 7" type="text"><br />
                <input name="ingr8" placeholder="Ingredient 8" type="text"><br />
                <input name="ingr9" placeholder="Ingredient 9" type="text"><br />
                <input name="ingr10" placeholder="Ingredient 10" type="text"><br />

                <label for="recipe_desc">Description:</label><br />
                <textarea name="description" placeholder="Description" type="text" required></textarea><br />

                <label for="recipe_desc">Cooking instructions:</label><br />
                <textarea name="instructions" placeholder="Instructions" type="text" required></textarea><br />

                <button type="submit">Send for review</button>
            </form>
        </div>
    </section>

    <?php
    $conn = new mysqli('localhost', 'root', '', 'recepts');

    if (isset($_POST['name']) and isset($_POST['photo']) and isset($_POST['description']) and isset($_POST['instructions'])) {
        $stmt = $conn->prepare("INSERT INTO recept (name,
                                                        photo,
                                                        ingr1,
                                                        ingr2,
                                                        ingr3,
                                                        ingr4,
                                                        ingr5,
                                                        ingr6,
                                                        ingr7,
                                                        ingr8,
                                                        ingr9,
                                                        ingr10,
                                                        description,
                                                        instructions
            ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param(
            "ssssssssssssss",
            $name,
            $photo,
            $ingr1,
            $ingr2,
            $ingr3,
            $ingr4,
            $ingr5,
            $ingr6,
            $ingr7,
            $ingr8,
            $ingr9,
            $ingr10,
            $description,
            $instructions
        );

        $name = $_POST['name'];
        $photo = $_POST['photo'];
        $ingr1 = $_POST['ingr1'];
        $ingr2 = $_POST['ingr2'];
        $ingr3 = $_POST['ingr3'];
        $ingr4 = $_POST['ingr4'];
        $ingr5 = $_POST['ingr5'];
        $ingr6 = $_POST['ingr6'];
        $ingr7 = $_POST['ingr7'];
        $ingr8 = $_POST['ingr8'];
        $ingr9 = $_POST['ingr9'];
        $ingr10 = $_POST['ingr10'];
        $description = $_POST['description'];
        $instructions = $_POST['instructions'];

        $stmt->execute();

        $stmt->close();
        $conn->close();
        header("Location: " . $_SERVER['PHP_SELF']);
    }
    ?>

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

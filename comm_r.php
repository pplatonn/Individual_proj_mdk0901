<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes from the community</title>
</head>
<body id="root">
    <?php
        $conn = new mysqli('localhost', 'root', '', 'recepts');

        $sql = "SELECT * FROM recept";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo 
                "<section>".
                    "<h1>".$row["name"]."</h1>".
                    "<img src='". $row["photo"]."'>".
                    "<h2>Ingredients</h2>".

                    "<ul>".
                    "<li>".$row["ingr1"]."</li>".
                    "<li>".$row["ingr2"]."</li>".
                    "<li>".$row["ingr3"]."</li>".
                    "<li>".$row["ingr4"]."</li>".
                    "<li>".$row["ingr5"]."</li>".
                    "<li>".$row["ingr6"]."</li>".
                    "<li>".$row["ingr7"]."</li>".
                    "<li>".$row["ingr8"]."</li>".
                    "<li>".$row["ingr9"]."</li>".
                    "<li>".$row["ingr10"]."</li>".
                    "</ul>".

                    "<h2>Description</h2>".
                    "<p>".$row["description"]."</p>".
                    "<h2>Instructions</h2>".
                    "<p>".$row["instructions"]."</p>".
                "</section>";
            }
        }
        else {
            echo "<section>There are no recipes from users.</section>";
        }
        
        $conn->close();
    ?>

    <script>
        const listItems = document.querySelectorAll('li');
        console.log("test");
        listItems.forEach(li => {
            if (li.textContent.length < 2) { li.remove(); }})
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding a recipe</title>
</head>
<body id="root">
    <form method="post" action="#">
        <input name="name" placeholder="Name" type="text" required>
        <input name="photo" placeholder="Link to photo" type="text" required>
        <input name="ingr1" placeholder="Ingredient 1" type="text">
        <input name="ingr2" placeholder="Ingredient 2" type="text">
        <input name="ingr3" placeholder="Ingredient 3" type="text">
        <input name="ingr4" placeholder="Ingredient 4" type="text">
        <input name="ingr5" placeholder="Ingredient 5" type="text">
        <input name="ingr6" placeholder="Ingredient 5" type="text">
        <input name="ingr7" placeholder="Ingredient 7" type="text">
        <input name="ingr8" placeholder="Ingredient 8" type="text">
        <input name="ingr9" placeholder="Ingredient 9" type="text">
        <input name="ingr10" placeholder="Ingredient 10" type="text">
        <textarea name="description" placeholder="Description" type="text" required></textarea>
        <textarea name="instructions" placeholder="Instructions" type="text" required></textarea>
	    <button type="submit">Send for review</button>
    </form>
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
            $stmt->bind_param("ssssssssssssss", $name,
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
                                                $instructions);
            
            $name=$_POST['name'];
            $photo=$_POST['photo'];
            $ingr1=$_POST['ingr1'];
            $ingr2=$_POST['ingr2'];
            $ingr3=$_POST['ingr3'];
            $ingr4=$_POST['ingr4'];
            $ingr5=$_POST['ingr5'];
            $ingr6=$_POST['ingr6'];
            $ingr7=$_POST['ingr7'];
            $ingr8=$_POST['ingr8'];
            $ingr9=$_POST['ingr9'];
            $ingr10=$_POST['ingr10'];
            $description=$_POST['description'];
            $instructions=$_POST['instructions'];

            $stmt->execute();

            $stmt->close();
            $conn->close();
            header("Location: " . $_SERVER['PHP_SELF']);
        }
    ?>
</body>
</html>